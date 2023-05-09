<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectMediaService;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    protected $media;

    public function __construct(ProjectMediaService $projectMediaService)
    {
        $this->media = $projectMediaService;
    }

    public function index(Request $request)
    {
        $projects = Project::query()
            ->when($request->has('user_id'), function ($query) use ($request){
                return $query->where('user_id', $request->get('user_id'));
            })
            ->paginate();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $this->authorize('create', Project::class);

        $data = $this->preparingData();

        return view('projects.create', [
            'users' => $data['users'],
            'clients' => $data['clients'],
            'statuses' => $data['statuses']
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $data = $request->validated();

        $project = Project::create($data);

        if ($request->hasFile('image')){
            $this->media->storeMedia($project, $data['image']);
        }

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        if (!$project){

            Log::error('Project not found');

            abort(404);
        }

        return view('projects.show', [
            'project' => $project,
            'image' => $this->media->getMedia($project)
        ]);
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $data = $this->preparingData();

        if (!$project || !$data){

            Log::error('Project or Users, Clients and statuses for Project not found');

            abort(404);
        }

        return view('projects.edit', [
            'project' => $project,
            'image' => $this->media->getMedia($project),
            'users' => $data['users'],
            'clients' => $data['clients'],
            'statuses' => $data['statuses']
        ]);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        if (!$project){

            Log::error('Project now found');

            abort(404);
        }

        $data = $request->validated();

        $project->update($data);

        if ($request->hasFile('image')){
            $this->media->editMedia($project, $data['image']);
        }

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        if (!$project){
            Log::error('Project not found');
            abort(404);
        }

        DB::beginTransaction();

        try {
            $this->media->deleteMedia($project);

            $project->delete();

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error($exception->getMessage());

            throw new \Exception($exception->getMessage());
        }

        return redirect()->route('projects.index');
    }

    public function preparingData(): array
    {
        $users = User::all();
        $clients = Client::all();
        $statuses = [
          'Draft' => Project::DRAFT,
          'Open' => Project::OPEN,
          'In Process' => Project::IN_PROCESS,
          'Finished' => Project::FINISHED
        ];

        return [
            'users' => $users,
            'clients' => $clients,
            'statuses' => $statuses
        ];
    }
}
