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
     * List all Orders made by user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listOrders()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
       
        return view('dashboard.order.show_orders', compact('orders'));
    }

    /**
     * Delete order
     *
     * @param $id
     *
     * @return mixed
     */
    public function deleteOrder($id)
    {
    	$order = Order::find($id);	
        $deleteOrder = $order->delete();

        if ($deleteOrder) {
            // code to inform user that it was succesfully
            return redirect()->route('list_orders');
        } else {
            // code to user that something went wrong

            return redirect()->route('list_orders');
        }
    }

    /**
     * Approve/Dissaprove order
     *
     * @param $id
     *
     * @return mixed
     */
    public function approveOrder($id)
    {
    	$order = Order::find($id);

    	if ($order->status === 0) {
        	$order->increment('status');

        	return redirect()->route('list_orders');
    	} else {
    		$order->decrement('status');

    		return redirect()->route('list_orders');
    	}
    }
}
