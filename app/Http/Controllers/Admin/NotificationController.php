<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;

        return view('admin.notifications', compact('unreadNotifications'));
    }

    public function markAsReadAll()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;

        $unreadNotifications->each(function ($notification) {
            $notification->markAsRead();
        });

        flash('Todas as notificações foram marcadas como lida.');

        return redirect()->back();
    }

    public function markAsRead ($notification)
    {
        $notification = auth()->user()->notifications()->find($notification);

        $notification->markAsRead();

        flash('Marcada como lida.');

        return redirect()->back();
    }
}
