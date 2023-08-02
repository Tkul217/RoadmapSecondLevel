<?php

namespace App\Http\Services;

use App\Http\Interfaces\ProjectInterface;
use App\Http\Interfaces\ProjectMediaInterface;
use App\Http\Requests\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectService implements ProjectInterface
{
    protected ProjectMediaInterface $projectMedia;
    public function __construct(
        ProjectMediaInterface $projectMedia
    )
    {
        $this->projectMedia = $projectMedia;
    }

    public function store(ProjectRequest $request): void
    {
        $data = $request->validated();

        $project = Project::create($data);

        if ($request->hasFile('image')){
            $this->projectMedia->storeMedia($project, $data['image']);
        }
    }

    public function update(ProjectRequest $request, Project $project): void
    {
        if (!$project){

            Log::error('Project now found');

            abort(404);
        }

        $data = $request->validated();

        $project->update($data);

        if ($request->hasFile('image')){
            $this->projectMedia->editMedia($project, $data['image']);
        }
    }

    public function destroy(Project $project): void
    {
        if (!$project){
            Log::error('Project not found');
            abort(404);
        }

        DB::beginTransaction();

        try {
            $this->projectMedia->deleteMedia($project);

            $project->delete();

            DB::commit();

        } catch (\Exception $exception) {

            DB::rollBack();

            Log::error($exception->getMessage());

            throw new \Exception($exception->getMessage());
        }
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
