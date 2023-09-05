<?php

namespace App\Http\Interfaces\Repositories;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
    public function update(Task $task, array $data): Task;
    public function getAllWithRelations(Request $request, $relations = []): LengthAwarePaginator;
    public function getWithFilter(): LengthAwarePaginator;
}
