<?php

namespace App\Http\Interfaces;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;

interface ProjectInterface
{
    public function store(ProjectRequest $request): void;
    public function update(ProjectRequest $request, Project $project): void;
    public function destroy(Project $project): void;
    public function preparingData(): array;
}
