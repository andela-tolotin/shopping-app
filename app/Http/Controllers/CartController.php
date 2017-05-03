<?php

namespace App\Http\Controllers;

use App\Product;
use App\Notification;
use App\PaymentGateway;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
    	return view('cart.checkout');
    }

    public function checkout(Request $request, $locale, $id)
    {
    	$product = Product::findOneById($id);
        $paymentGateways = PaymentGateway::findAll();
        $adminNotification = Notification::where([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

        if ($product instanceof Product) {
            return view('cart.checkout', compact('product', 'paymentGateways', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
        }

        abort(404);
    }
}
