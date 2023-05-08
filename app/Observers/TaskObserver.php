<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskNotification;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Created new Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        User::find($task->id)
            ->notify(new TaskNotification('Updated Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Deleted Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Restored Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Force Deleted Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));
    }
}
