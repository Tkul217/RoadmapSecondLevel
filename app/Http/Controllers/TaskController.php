<?php

namespace App\Http\Controllers;

use App\Http\Services\TaskMediaService;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\QueryException;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskMediaService $taskMediaService)
    {
        $this->taskService = $taskMediaService;
    }

    public function index()
    {
        $tasks = Task::query()
            ->with(['project', 'user'])
            ->paginate();

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('List tasks')
        ]);
    }

    public function userTasks(){
        $tasks = Task::query()
            ->with(['project', 'user'])
            ->where('user_id', auth()->id())
            ->paginate();

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('My tasks')
        ]);
    }

    public function show(Task $task){
        if (!$task){
            abort(404);
        }

        return view('tasks.show', [
            'task' => $task,
            'files' => $this->taskService->getMedia($task)
        ]);
    }

    public function create(){
        return view('tasks.create', $this->getData());
    }

    public function store(TaskRequest $request){
        $data = $request->validated();

        $task = Task::create($data);

        $this->taskService->storeMedia($task, $data['files']);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task){
        if (!$task){
            abort(404);
        }

        return view('tasks.edit', [
            'data' => collect($task)->merge($this->getData())
        ]);
    }

    public function update(Task $task, TaskRequest $request){
        if (!$task){
            abort(404);
        }

        $data = $request->validated();

        $task->update($data);

        $this->taskService->editMedia($task, $data['files']);

        return redirect()->route('tasks.show', $task);
    }

    public function destroy(Task $task){
        if (!$task){
            abort(404);
        }

        try {
            $this->taskService->deleteMedia($task);

            $task->delete();
        } catch (QueryException $exception){
            throw new \Exception('You can not delete this task, because '.$exception->getMessage());
        }

        return redirect()->route('tasks.index');
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
