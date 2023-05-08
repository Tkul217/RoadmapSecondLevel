<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectNotification;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        User::find($project->user_id)
            ->notify(new ProjectNotification('Created new Project with you where id: ' . $project->id));
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        User::find($project->user_id)
            ->notify(new ProjectNotification('Updated Project with you where id: ' . $project->id));
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        User::find($project->user_id)
            ->notify(new ProjectNotification('Deleted Project with you where id: ' . $project->id));
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        User::find($project->user_id)
            ->notify(new ProjectNotification('Restored Project with you where id: ' . $project->id));
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        User::find($project->id)
            ->notify(new ProjectNotification('Force Deleted Project with you where id: ' . $project->id));
    }
}
