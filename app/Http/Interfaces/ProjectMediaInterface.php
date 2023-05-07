<?php

namespace App\Http\Interfaces;

use App\Models\Project;

interface ProjectMediaInterface
{
    public function getMedia(Project $project);

    public function storeMedia(Project $project, $image): void;

    public function editMedia(Project $project, $image): void;

    public function deleteMedia(Project $project): void;
}
