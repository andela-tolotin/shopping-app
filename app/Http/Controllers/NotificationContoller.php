<?php

namespace App\Http\Controllers;

use Auth;
use App\Notification;
use Illuminate\Http\Request;

class NotificationContoller extends Controller
{
    public function loadNotification()
    {
    	$notifications = Notification::where('user_id', Auth::user()->id)->get();

    	$adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('notification', compact('notifications', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }
}
