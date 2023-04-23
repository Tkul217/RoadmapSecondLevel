<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\QueryException;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
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

    public function activeTasks(){
        $tasks = Task::query()
            ->with(['project', 'user'])
            ->where('status', Task::ACTIVE)
            ->paginate();

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('Active tasks')
        ]);
    }

    public function progressTasks(){
        $tasks = Task::query()
            ->with(['project', 'user'])
            ->where('status', Task::IN_PROGRESS)
            ->paginate();

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('Progress tasks')
        ]);
    }

    public function closedTasks(){
        $tasks = Task::query()
            ->with(['project', 'user'])
            ->where('status', Task::CLOSED)
            ->paginate();

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('Closed tasks')
        ]);
    }

    public function create(){
        return view('tasks.create', $this->getData());
    }

    public function store(TaskRequest $request){
        $data = $request->validated();

        Task::create($data);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task){
        return view('tasks.edit', [
            'data' => collect($task)->merge($this->getData())
        ]);
    }

    public function update(Task $task, TaskRequest $request){
        $task->update($request->validated());

        return redirect()->route('tasks.show', $task);
    }

    public function destroy(Task $task){
        try {
            $task->delete();
            return redirect()->route('tasks.index');
        } catch (QueryException $exception){
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
