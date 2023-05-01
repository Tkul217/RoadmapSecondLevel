<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Models\User;
use Illuminate\Database\QueryException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $data = $this->preparingData();
        return view('projects.create', [
            'users' => $data['users'],
            'clients' => $data['clients'],
            'statuses' => $data['statuses']
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        Project::create($data);

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        if (!$project){
            abort(404);
        }

        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function edit(Project $project)
    {
        $data = $this->preparingData();
        if (!$project || !$data){
            abort(404);
        }

        return view('projects.edit', [
            'project' => $project,
            'users' => $data['users'],
            'clients' => $data['clients'],
            'statuses' => $data['statuses']
        ]);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        if (!$project){
            abort(404);
        }

        $data = $request->validated();

        $project->update($data);

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        if (!$project){
            abort(404);
        }

        try {
            $project->delete();
        } catch (QueryException $exception) {
            throw new \Exception($exception->getMessage());
        } catch (\Exception $exception) {
            abort(500);
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
          'In Process' => Project::IN_PROCESS
        ];

        return [
            'users' => $users,
            'clients' => $clients,
            'statuses' => $statuses
        ];
    }
}
