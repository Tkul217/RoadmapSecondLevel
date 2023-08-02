<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Repositories\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);

        return $task;
    }

    public function getAllWithRelations(Request $request, $relations = []): LengthAwarePaginator
    {
        $filteredData = Task::query();

        foreach ($request->only(['user_id', 'client_id']) as $name => $value) {
            $filteredData->when($request->has($name), function ($q) use ($name, $value) {
               return $q->where($name, $value);
            });
        }

        if (!empty($relations)) {
            $filteredData->with($relations);
        }

        return $filteredData->paginate();
    }
}
