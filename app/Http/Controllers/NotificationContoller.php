<?php

namespace App\Http\Controllers;

use Auth;
use App\Notification;
use App\ServiceManager;
use Illuminate\Http\Request;

class NotificationContoller extends Controller
{
    public function loadNotification()
    {
        $user = Auth::user()->id;
        $asignedProduct = null;

        dump($user->serviceManager); exit;

        if (!is_null($user->serviceManager)) {
            $asignedProduct = $user->serviceManager->product_id;
        }

        $serviceManager = ServiceManager::where('user_id', Auth::user()->id)->get();
        $allManagerNotification = [];

        if (count($serviceManager) > 0 ) {
            foreach ($serviceManager as $key => $value) {
                $managerNotification = Notification::where([
                    ['action', 'Login succesfully'], 
                    ['user_id', Auth::user()->id],
                    ['product_id', $asignedProduct]
                ])->orWhere([
                    ['action', 'Made Order'], 
                    //['product_id', $value['product_id']]
                ])->groupBy('id', 'created_at')
                ->orderBy('created_at', 'DESC')
                ->get();

                array_push($allManagerNotification, $managerNotification);
            }
        }

        $managerNotification = Notification::where([
            ['action', 'Login succesfully'], 
            ['user_id', Auth::user()->id],
            ['product_id', $asignedProduct]
            ])->groupBy('id', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        array_push($allManagerNotification, $managerNotification);        
        
    	$allBuyerNotifications = Notification::where([['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere([['action', 'Approve Order'], ['user_id', Auth::user()->id]])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();
        $allAdminNotifications = Notification::where([['action', 'Login succesfully'], ['user_id', Auth::user()->id]])->orWhere('action', 'Made Order')->groupBy('id', 'created_at')->orderBy('created_at', 'DESC')->get();

    	return view('notification', compact('allBuyerNotifications', 'allAdminNotifications', 'allManagerNotification'));
    }

    public function readNotifications()
    {
        $notifications = Notification::where('status', '<=', 1)->update(['status' => 0]);
        
        return response()->json(['message' => 'Succesfully read all', 'status' => 201]);
    }
}
