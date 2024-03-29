<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:agent,tenant,owner');
    }
    /**
     * Fetch all unread notifications for the user.
     *
     * @return mixed
     */
    public function index()
    {
        return auth()->user()->unreadNotifications;
    }
    /**
     * Mark a specific notification as read.
     *
     * @param \App\User $user
     * @param int       $notificationId
     */
    public function destroy($notificationId)
    {
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
        return json_encode(
            $notification->data
        );
    }
}
