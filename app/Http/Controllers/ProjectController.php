<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProjectInterface;
use App\Http\Interfaces\ProjectMediaInterface;
use App\Http\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    protected $project;
    protected $projectRepository;
    protected $media;

    public function __construct(
        ProjectInterface $project,
        ProjectRepositoryInterface $projectRepository,
        ProjectMediaInterface $media
    )
    {
        $this->media = $media;
        $this->project = $project;
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        $projects = $this->projectRepository->filter($request);

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $this->authorize('create', Project::class);

        $data = $this->project->preparingData();

        return view('projects.create', [
            'users' => $data['users'],
            'clients' => $data['clients'],
            'statuses' => $data['statuses']
        ]);
    }

    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $this->project->store($request);

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

        $data = $this->project->preparingData();

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

        $this->project->update($request, $project);

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $this->project->destroy($project);

        return redirect()->route('projects.index');
    }
}
