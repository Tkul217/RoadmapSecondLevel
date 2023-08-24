<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function filter(Request $request): LengthAwarePaginator
    {
        $filteredData = Project::query();
        foreach ($request->only(['user_id', 'client_id']) as $key => $value) {
            $filteredData->when($request->has($key), function ($query) use ($key, $value) {
               return $query->where($key, $value);
            });
        }
        return $filteredData->paginate();
    }
}
