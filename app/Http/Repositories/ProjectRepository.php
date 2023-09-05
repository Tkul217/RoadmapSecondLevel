<?php

namespace App\Http\Repositories;

use App\Http\Filter\ProjectFilter;
use App\Http\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getWithFilters(): LengthAwarePaginator
    {
        $filter = new ProjectFilter(
          Project::query(),
          request()
        );

        return $filter->apply()->paginate();
    }
}
