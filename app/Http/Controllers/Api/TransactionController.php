<?php

namespace App\Http\Controllers\Api;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function createTransaction(Request $request)
    {
    	if ($request->get('item_name') != '' &&
    		$request->get('item_quantity') != '' &&
    		$request->get('item_price') != '' &&
    		$request->get('email') != '' &&
            $request->get('phone') != '' && 
            $request->get('payment_gateway_id') != '' && 
            $request->get('product_id') != '' && 
            $request->get('user_id') != ''
    	) {

		$transaction = Transaction::create([
			'item_name' => $request->get('item_name'),
			'item_quantity' => $request->get('item_quantity'),
			'item_price' => $request->get('item_price'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),
			'payment_gateway_id' => $request->get('payment_gateway_id'),
			'product_id' => $request->get('product_id'),
			'user_id' => $request->get('user_id'),
		]);

    		return response()->json($transaction, 200);
    	}

    	return response()->json(['message' => 'Error Creating Transaction']);
    }

    public function updateTransaction(Request $request, $id)
    {
    	$transaction = Transaction::findOneById($id);

		if ($transaction instanceof Transaction) {
			$transaction->update([
				'item_name' => $request->get('item_name'),
				'item_quantity' => $request->get('item_quantity'),
				'item_price' => $request->get('item_price'),
				'email' => $request->get('email'),
				'phone' => $request->get('phone'),
				'payment_gateway_id' => $request->get('payment_gateway_id'),
				'product_id' => $request->get('product_id'),
				'user_id' => $request->get('user_id'),
			]);

			return response()->json($transaction, 200);
		} 

    	return response()->json(['message' => 'Transaction not found'], 404);
    }

    public function getTransactions()
    {
    	$transactions = Transaction::findAll();

    	if ($transactions->count() > 0) {
    		return response()->json($transactions, 200);
    	}

    	return response()->json(['message' => 'Transactions not found'], 404);
    }

    public function getTransaction(Request $request, $id)
    {
    	$transaction = Transaction::findOneById($id);

    	if ($transaction instanceof Transaction) {
    		return response()->json($transaction, 200);
    	}

    	return response()->json(['message' => 'Transaction not found'], 404);
    }

}
