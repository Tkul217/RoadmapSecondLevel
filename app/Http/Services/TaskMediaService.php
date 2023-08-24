<?php

namespace App\Http\Services;

use App\Http\Interfaces\TaskMediaInterface;
use App\Models\Task;

class TaskMediaService implements TaskMediaInterface
{
    public function getMedia(Task $task)
    {
        return $task->getMedia('task-files');
    }

    public function storeMedia(Task $task, $files): void
    {
        if (!is_array($files)){
            $task->addMedia($files)->toMediaCollection('task-files');
        }
        else {
            foreach ($files as $file){
                $task->addMedia($file)->toMediaCollection('task-files');
            }
        }
    }

    public function editMedia(Task $task, $files): void
    {
        $task->clearMediaCollection('task-files');

        if (!is_array($files)){
            $task->addMedia($files)->toMediaCollection('task-files');
        }
        else {
            foreach ($files as $file) {
                $task->addMedia($file)->toMediaCollection('task-files');
            }
        }
    }

    public function deleteMedia(Task $task): void
    {
        $task->clearMediaCollection('task-files');
    }
}
