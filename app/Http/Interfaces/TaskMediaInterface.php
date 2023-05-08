<?php

namespace App\Http\Interfaces;

use App\Models\Task;

interface TaskMediaInterface
{
    public function getMedia(Task $task);

    public function storeMedia(Task $task, $files): void;

    public function editMedia(Task $task, $files): void;

    public function deleteMedia(Task $task): void;
}
