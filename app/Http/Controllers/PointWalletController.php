<?php

namespace App\Http\Controllers;

use App;
use App\PointWallet;
use App\Notification;
use App\PaymentGateway;
use Illuminate\Http\Request;

class PointWalletController extends Controller
{
    public function loadPointAmountForm(Request $request)
    {
        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('dashboard.point.point_amount', compact('adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }

    public function loadPointBag(Request $request)
    {
    	$point = 0;

    	if ($request->has('point')) {
    		$point = $request->get('point');
    	}

    	if (($point % 1) > 0) {
    		return redirect()
                ->route('load_buy_point')
                ->with('message', 'Enter your point in whole number e.g 1 or 2');
    	}

    	$paymentGateways = PaymentGateway::findAll();

        $amount = $point;

        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('dashboard.point.buy_point', compact('paymentGateways', 'amount', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }
}
