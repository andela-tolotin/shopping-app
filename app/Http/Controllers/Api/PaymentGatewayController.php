<?php

namespace App\Http\Controllers\Api;

use App\PaymentGateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentGatewayController extends Controller
{
    public function createPaymentGateway(Request $request)
    {
    	if ($request->get('name') != '' &&
    		$request->get('logo') != '' &&
    		$request->get('client_id') != '' &&
    		$request->get('client_secret') != '' &&
            $request->get('callback_url') != ''
    	) {
    	
    	$paymentGateway = PaymentGateway::findOneByName($request->get('name'));

    	if ($paymentGateway instanceof PaymentGateway) {
    		return response()->json(['message' => 'PaymentGateway already exists'], 404);
    	}

		$paymentGateway = PaymentGateway::create([
			'name' => $request->get('name'),
			'logo' => $request->get('logo'),
			'client_id' => $request->get('client_id'),
			'client_secret' => $request->get('client_secret'),
			'callback_url' => $request->get('callback_url'),
		]);

    		return response()->json($paymentGateway, 200);
    	}

    	return response()->json(['message' => 'Error Creating PaymentGateway']);
    }

    public function updatePaymentGateway(Request $request, $id)
    {
    	if ($request->get('name') != '') {
    		$paymentGateway = PaymentGateway::findOneById($id);

    		if ($paymentGateway instanceof PaymentGateway) {
    			$paymentGateway->update([
    				'name' => $request->get('name'), 
					'logo' => $request->get('logo'), 
					'client_id' => $request->get('client_id'),
					'client_secret' => $request->get('client_secret'), 
					'callback_url' => $request->get('callback_url'),
    			]);

    			return response()->json($paymentGateway, 200);
    		}

    		return response()->json(['message' => 'PaymentGateway not found'], 404);
    	}

    	return response()->json(['message' => 'Error Updating PaymentGateway'], 400);
    }

    public function getPaymentGateways()
    {
    	$paymentGateways = PaymentGateway::findAll();

    	if ($paymentGateways->count() > 0) {
    		return response()->json($paymentGateways, 200);
    	}

    	return response()->json(['message' => 'PaymentGateways not found'], 404);
    }

    public function getPaymentGateway(Request $request, $id)
    {
    	$paymentGateway = PaymentGateway::findOneById($id);

    	if ($paymentGateway instanceof PaymentGateway) {
    		return response()->json($paymentGateway, 200);
    	}

    	return response()->json(['message' => 'PaymentGateway not found'], 404);
    }

    public function getTransactions(Request $request, $id)
    {
    	$paymentGateway = PaymentGateway::findOneById($id);

    	if ($paymentGateway instanceof PaymentGateway) {
    		return response()->json([
    			'payment_gateways' => $paymentGateway->toArray(),
    			'transactions' => $paymentGateway->transactions
    		], 200);
    	}

    	return response()->json(['message' => 'PaymentGateway not found'], 404);
    }
}
