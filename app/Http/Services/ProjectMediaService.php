<?php

namespace App\Http\Services;

use App\Http\Interfaces\ProjectMediaInterface;
use App\Models\Project;

class ProjectMediaService implements ProjectMediaInterface
{
    public function getMedia(Project $project)
    {
        return $project->getFirstMedia('project-images');
    }

    public function storeMedia(Project $project, $image): void
    {
        $project->addMedia($image)->toMediaCollection('project-images');
    }

    public function editMedia(Project $project, $image): void
    {
        $project->clearMediaCollection('project-images');

        $project->addMedia($image)->toMediaCollection('project-images');
    }

    public function deleteMedia(Project $project): void
    {
        $project->clearMediaCollection('project-images');
    }
}
