<?php

namespace App\Http\Controllers;

use Cloudder;
use App\PaymentGateway;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigPaymentRequest;

class PaymentController extends Controller
{
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
    			return redirect()->route('config_payment')->with('status', 'Payment Gateway Configured Successful!');
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
