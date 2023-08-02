<?php

namespace App\Http\Services;

use App\Http\Interfaces\Repositories\TaskRepositoryInterface;
use App\Http\Interfaces\TaskInterface;
use App\Http\Interfaces\TaskMediaInterface;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class TaskService implements TaskInterface
{
    protected TaskMediaInterface $taskMedia;
    protected TaskRepositoryInterface $taskRepository;
    public function __construct(
        TaskMediaInterface $taskMedia,
        TaskRepositoryInterface $taskRepository
    )
    {
        $this->taskMedia = $taskMedia;
        $this->taskRepository = $taskRepository;
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $task = $this->taskRepository->create($data);

        if ($request->hasFile('files')){
            $this->taskMedia->storeMedia($task, $data['files']);
        }
    }

    public function update(Task $task, TaskRequest $request)
    {
        if (!$task){

            Log::error('Task not found');

            abort(404);
        }

        $data = $request->validated();

        $this->taskRepository->update($task, $data);

        if ($request->hasFile('files')){
            $this->taskMedia->editMedia($task, $data['files']);
        }
    }

    public function destroy(Task $task): void
    {
        if (!$task){
            abort(404);
            Log::error('Task not found');
        }

        try {
            $this->taskMedia->deleteMedia($task);

            $task->delete();
        } catch (QueryException $exception){

            Log::error($exception->getMessage());

            throw new \Exception('You can not delete this task, because '.$exception->getMessage());
        }
    }

    public function getData(): array
    {
        $statuses = [
            'Active' => Task::ACTIVE,
            'In Progress' => Task::IN_PROGRESS,
            'Closed' => Task::CLOSED
        ];

        $users = User::all();

        $projects = Project::all();

        return [
            'statuses' => $statuses,
            'projects' => $projects,
            'users' => $users
        ];
    }
}
