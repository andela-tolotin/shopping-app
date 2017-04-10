<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class OrderController extends Controller
{
    /**
     * List all Orders made by all users
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listOrders()
    {
        $unapprovedOrders = Order::where('status', 0)->orderBy('created_at', 'DESC')->get();
        $approvedOrders   = Order::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
       
        return view('dashboard.order.show_orders', compact('approvedOrders', 'unapprovedOrders'));
    }

    /**
     * List all Orders made by current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listCurrentUserOrders()
    {
        $orders   = Auth::user()->orders()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $orderTotal = 0;

        foreach ($orders as $key => $value) {
            $orderTotal += $value->transaction->item_price;
        }

        return view('dashboard.order.show_user_orders', compact('orders', 'orderTotal'));
    }

    /**
     * Delete order
     *
     * @param $id
     *
     * @return mixed
     */
    public function deleteOrder(Request $request, $locale, $id)
    {
    	$order = Order::find($id);	
        $deleteOrder = $order->delete();

        if ($deleteOrder) {
            // code to inform user that it was succesfully
            return redirect()->route('list_orders', ['locale' => $locale]);
        }
        // code to user that something went wrong
        return redirect()->route('list_orders', ['locale' => $locale]);
        
    }

    /**
     * Approve/Dissaprove order
     *
     * @param $id
     *
     * @return mixed
     */
    public function approveOrder(Request $request, $locale, $id)
    {
    	$order = Order::find($id);

    	if ($order->status === 0) {
        	$order->increment('status');

        	return redirect()->route('list_orders', ['locale' => $locale]);
    	} else {
    		$order->decrement('status');

    		return redirect()->route('list_orders', ['locale' => $locale]);
    	}
    }
}
