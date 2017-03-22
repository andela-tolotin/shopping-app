<?php

namespace App\Http\Controllers;

use Cloudder;
use App\PaymentGateway;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigPaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
	public function deletePayment(Request $request, $id)
    {
    	$paymentGateway = PaymentGateway::findOneById($id);

    	if ($paymentGateway instanceof PaymentGateway) {
    		$paymentGateway->forceDelete();

    		return redirect()->route('list_payments');
    	}

    	abort(404);
    }

	public function updatePayment(UpdatePaymentRequest $request, $id)
	{
		$paymentGateway = PaymentGateway::findOneById($id);

		if ($paymentGateway instanceof PaymentGateway) {
			$name = $request->name;
	    	$clientId = $request->client_id;
	    	$clientSecret = $request->client_secret;
	    	$callbackUrl = $request->callback_url;
	    	$paymentGatewayLogo = $request->file('photo');

	    	if ($paymentGatewayLogo != '') {
	    		$paymentGateway->logo = $this->handleCloudinaryFileUpload($request);
	    	}

	    	$paymentGateway->name = $name;
	    	$paymentGateway->client_id = $clientId;
	    	$paymentGateway->client_secret = $clientSecret;
	    	$paymentGateway->callback_url = $callbackUrl;

	    	$paymentGateway->save();

	    	if ($paymentGateway instanceof PaymentGateway) {
	    		return redirect()->route('list_payments');
	    	}
		}

		abort(404);
	}

	public function editPayment(Request $request, $id)
	{
		$paymentGateway = PaymentGateway::findOneById($id);

		if ($paymentGateway instanceof PaymentGateway) {
			return view('dashboard.payment.edit_payment', compact('paymentGateway'));
		}

		abort(401);
	}

	public function listpaymentGateway()
	{
		$paymentGateways = PaymentGateway::findAll();

		if ($paymentGateways->count() > 0) {
			return view('dashboard.payment.list_payments', compact('paymentGateways'));
		}

		abort(401);
	}

    public function addPaymentConfig(ConfigPaymentRequest $request)
    {
    	$name = $request->name;
    	$clientId = $request->client_id;
    	$clientSecret = $request->client_secret;
    	$callbackUrl = $request->callback_url;
    	$paymentGatewayLogo = $request->file('photo');

    	if ($paymentGatewayLogo != '') {
    		$paymentGateway = PaymentGateway::create([
    			'name' => $name, 
    			'logo' => $this->handleCloudinaryFileUpload($request), 
    			'client_id' => $clientId,
    			'client_secret' => $clientSecret, 
    			'callback_url' => $callbackUrl,
    		]);

    		if ($paymentGateway instanceof PaymentGateway) {
    			return redirect()->route('list_payments');
    		}

    		abort(503);
    	}
    }

    public function loadPaymentConfigForm()
    {
    	return view('dashboard.payment.add_payment');
    }

    /**
     * This method upload image to cloudinary.
     *
     * @param $request
     *
     * @return picture url
     */
    public function handleCloudinaryFileUpload($request)
    {
        $avatar = $request->file('photo');
        $avatar = Cloudder::upload($avatar, null, [
            'format' => 'jpg',
            'crop'   => 'fill',
            'width'  => 250,
            'height' => 250,
        ]);
        return  Cloudder::getResult()['url'];
    }
}
