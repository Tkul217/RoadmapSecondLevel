<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = collect(auth()->user()?->unreadNotifications);

        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }

    public function readNotifications(){
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->route('dashboard');
    }
}
