<?php

namespace App\Http\Controllers;

use App\Http\Generators\TaskTableGenerator;
use App\Http\Interfaces\Repositories\TaskRepositoryInterface;
use App\Http\Interfaces\TaskInterface;
use App\Http\Interfaces\TaskMediaInterface;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function __construct(
        protected TaskMediaInterface $taskMediaService,
        protected TaskInterface $taskService,
        protected TaskRepositoryInterface $taskRepository
    )
    {
    }

    public function index(Request $request, TaskTableGenerator $generator)
    {
        $tasks = $this->taskRepository->getAllWithRelations($request, ['project', 'user']);

        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => __('List tasks'),
            'table' => $generator->handle()
        ]);
    }

    public function show(Task $task){
        if (!$task){

            Log::error('Task not found');

            abort(404);
        }
        return view('tasks.show', [
            'task' => $task,
            'files' => $this->taskMediaService->getMedia($task)
        ]);
    }

    public function create(){
        return view('tasks.create', $this->getData());
    }

    public function store(TaskRequest $request){
        $this->taskService->store($request);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task){
        if (!$task){

            Log::error('Task not found');

            abort(404);
        }

        return view('tasks.edit', [
            'data' => collect($task)->merge($this->taskService->getData())
        ]);
    }

    public function update(Task $task, TaskRequest $request){
        $this->taskService->update($task, $request);

        return redirect()->route('tasks.show', $task);
    }

    public function destroy(Task $task){
        $this->taskService->destroy($task);

        return redirect()->route('tasks.index');
    }
}
