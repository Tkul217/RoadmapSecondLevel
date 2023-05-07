<?php

namespace App\Http\Interfaces;

use App\Models\Project;

interface ProjectMediaInterface
{
    public function getMedia(Project $project);

    public function editMedia(Project $project);

    public function deleteMedia(Project $project);
}
