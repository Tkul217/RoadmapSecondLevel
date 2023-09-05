<?php

namespace App\Http\Filter;

use App\Http\Abstracts\FilterGenerator;

class TaskFilter extends FilterGenerator
{
    public function user($user): void
    {
        $this->builder->where('user_id', $user);
    }

    public function project($project): void
    {
        $this->builder->where('project_id', $project);
    }

    public function title($title): void
    {
        $this->builder->where('title', 'like', "%$title%");
    }

    public function description($description): void
    {
        $this->builder->where('description', 'like', "%$description%");
    }

    public function status($status): void
    {
        $this->builder->where('status', $status);
    }
}
