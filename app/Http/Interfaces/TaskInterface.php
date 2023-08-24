<?php

namespace App\Http\Interfaces;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

interface TaskInterface
{

    public function store(TaskRequest $request);
    public function update(Task $task, TaskRequest $request);
    public function destroy(Task $task): void;
    public function getData(): array;
}
