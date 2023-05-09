<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskNotification;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Created new Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));

        Log::info('Notification created Task send successfully');
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        User::find($task->id)
            ->notify(new TaskNotification('Updated Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));

        Log::info('Notification updated Task send successfully');
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Deleted Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));

        Log::info('Notification deleted Task send successfully');
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Restored Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));

        Log::info('Notification restored Task send successfully');
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        User::find($task->user_id)
            ->notify(new TaskNotification('Force Deleted Task with your where id: ' . $task->id . ' In Project id: ' . $task->project_id));

        Log::info('Notification force deleted Task send successfully');
    }
}
