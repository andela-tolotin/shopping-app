<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Cloudder;
use App\Order;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;
use Carbon\Carbon;
use Stripe\Customer;
use App\PointWallet;
use App\Transaction;
use App\Notification;
use App\PaymentGateway;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigPaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    public function payWithInicis(Request $request)
    {

    }

    public function buyProductWithPoint(Request $request, $locale, $id)
    {
        $userPoint = $request->get('point');

        $balance = 0;

        $pointWallet = Auth::user()->pointWallet;
        $product = Product::findOneById($id);

        if (!is_null($pointWallet)) {
            $balance = (int) ($pointWallet->point - $pointWallet->balance);

            if ($userPoint != ($pointWallet->point - $pointWallet->balance)) {
                return response()->json(['message' => 'The Point Wallet mismatch']);
            }

            if ($balance < $product->price) {
                return response()->json(['message' => 'The point you have cannot pay for this service']);
            }
        }

        if ($product instanceof Product) {
            // add the transaction history
            $transaction = Transaction::create([
                'currency' => 'KRW',
                'item_name' => $product->name,
                'item_quantity' => 1,
                'item_price' => $product->price,
                'email' => Auth::user()->email,
                'phone' => is_null(Auth::user()->email) ? null : Auth::user()->email,
                'status' => 1,
                'payment_gateway_id' => $pointWallet->payment_gateway_id,
                'product_id' => $product->id,
                'user_id' => Auth::user()->id,
                'transaction_ref_id' => $pointWallet->id
            ]);

            // store the purchase in the order table
            Order::create([
                'product_id' => $product->id,
                'transaction_id' => $transaction->id,
                'assignee_id' => $product->assignee_id,
                'status' => 0,
                'user_id' => Auth::user()->id ?? null,
            ]);

            // Log the notification in the notification table
            $this->logNotification();

            if (! is_null(Auth::user())) {
                // deduct money from point wallet
                $transactions = array_pluck(Auth::user()->transactions, 'item_price');
                $totalTransactions = (int) array_sum($transactions);
                // find the point wallet and update the balance
                $pWallet = PointWallet::findOneByUser(Auth::user()->id);
                $pWallet->balance = $totalTransactions;
                $pWallet->save();

                return response()->json(['message' => true]);
            }
        }
    }

    public function buyPointWithStripe(Request $request)
    {
        $locale = App::getLocale();

        $amount = $_POST['amount'];
        $token  = $_POST['stripeToken'];
        $email = $_POST["stripeEmail"];
        $paymentGatewayId = $_POST['payment_gateway_id'];
        //Set the Stripe Api Key
        $stripe = [
            "secret_key"      => env('STRIPE_SECRET'),
            "publishable_key" => env('STRIPE_KEY')
        ];
        // set api key
        Stripe::setApiKey($stripe['secret_key']);
        // create the customer
        $customer = Customer::create([
            'email' => $email,
            'source'  => $token
        ]);
        // charge the customer
        $charge = Charge::create([
            'customer' => $customer->id,
            'amount'   => $amount,
            'currency' => 'krw'
        ]);

        //Transactions from the charge object
        $transactionId = $charge->balance_transaction;
        $transactionAmount = $charge->amount;
        $transactionCurrency = $charge->currency;
        $transactionStatus = $charge->paid;
        $multiplier = 1000; // 1 krw = 1 point and payment is made in 100's
        $productAmount = ($transactionAmount / $multiplier);
        // interact with the point wallet
        if (! is_null(Auth::user())) {
            $pointWallet = PointWallet::findOneByUser(Auth::user()->id);
            if ($pointWallet instanceof PointWallet) {
                $pointWallet->point = $pointWallet->point + $productAmount;
                $pointWallet->save();
            } else {
                PointWallet::create([
                    'user_id' => Auth::user()->id,
                    'payment_gateway_id' => $paymentGatewayId,
                    'point' => (int) $productAmount,
                ]);
            }
        }

        if ($transactionStatus) {
            // return a flash message regarding the payment status
            return redirect()
            ->route('load_buy_point', ['locale' =>  $locale])
            ->with('status', true);
        }
        // return a flash message regarding the status of the payment
        return redirect()
            ->route('load_buy_point', ['locale' =>  $locale])
            ->with('status', false);
    }

    public function payWithStrip(Request $request)
    {
        $locale = App::getLocale();

        $amount = $_POST['amount'];
        $token  = $_POST['stripeToken'];
        $email = $_POST["stripeEmail"];
        $paymentGatewayId = $_POST['payment_gateway_id'];
        //Set the Stripe Api Key
        $stripe = [
            "secret_key"      => env('STRIPE_SECRET'),
            "publishable_key" => env('STRIPE_KEY')
        ];
        // set api key
        Stripe::setApiKey($stripe['secret_key']);
        // create the customer
        $customer = Customer::create([
            'email' => $email,
            'source'  => $token
        ]);
        // charge the customer
        $charge = Charge::create([
            'customer' => $customer->id,
            'amount'   => $amount,
            'currency' => 'krw'
        ]);
        //Transactions from the charge object
        $transactionId = $charge->balance_transaction;
        $transactionAmount = $charge->amount;
        $transactionCurrency = $charge->currency;
        $transactionStatus = $charge->paid;
        $multiplier = 1000; // 1 krw = 1 point and payment is made in 100's
        $productAmount = ($transactionAmount / $multiplier);
        // interact with the point wallet
        if (! is_null(Auth::user())) {
            $pointWallet = PointWallet::findOneByUser(Auth::user()->id);
            if ($pointWallet instanceof PointWallet) {
                $pointWallet->point = $pointWallet->point + $productAmount;
                $pointWallet->save();
            } else {
                PointWallet::create([
                    'user_id' => Auth::user()->id,
                    'payment_gateway_id' => $paymentGatewayId,
                    'point' => (int) $productAmount,
                ]);
            }
        }
        // find the product details
        $productId = $_POST['product_id']; // product id
        $product = Product::findOneById($productId);

        if ($product instanceof Product) {
            // add the transaction history
            $transaction = Transaction::create([
                'currency' => 'KRW',
                'item_name' => $product->name,
                'item_quantity' => 1,
                'item_price' => $product->price,
                'email' => $email,
                'phone' => null,
                'status' => $transactionStatus ? 1 : 0,
                'payment_gateway_id' => $paymentGatewayId,
                'product_id' => $product->id,
                'user_id' => is_null(Auth::user()) ? null : Auth::user()->id,
                'transaction_ref_id' => $charge->balance_transaction
            ]);

            // store the purchase in the order table
            Order::create([
                'product_id' => $product->id,
                'transaction_id' => $transaction->id,
                'status' => 0,
                'assignee_id' => $product->assignee_id,
                'user_id' => Auth::user()->id ?? null,
            ]);

            // Log the notification in the notification table
            $this->logNotification();

            if (! is_null(Auth::user())) {
                // deduct money from point wallet
                $transactions = array_pluck(Auth::user()->transactions, 'item_price');
                $totalTransactions = (int) array_sum($transactions);
                // find the point wallet and update the balance
                $pWallet = PointWallet::findOneByUser(Auth::user()->id);
                $pWallet->balance = $totalTransactions;
                $pWallet->save();
            }

            if ($transactionStatus) {
                // return a flash message regarding the payment status
                return redirect()
                ->route('purchase_product', ['locale' =>  $locale, 'id' => $product->id])
                ->with('status', true);
            }
            // return a flash message regarding the status of the payment
            return redirect()
                ->route('purchase_product', ['locale' =>  $locale, 'id' => $product->id])
                ->with('status', false);
        }
    }

    /**
     * Log notification
     *
     * @return bolean
     */
    protected function logNotification()
    {
        return Notification::create([
                'user_id' => Auth::user()->id ?? null,
                'message' => "User made an order",
                'status' => 1,
                'action' => 'Made Order',
                'date_created' => Carbon::now(),
                'url' => "/en/orders",
            ]);
    }

    /**
     * decrement status to 0
     *
     * @return bolean
     */
    protected function decrementStatus()

    {
        $notification = Notification::where('user_id', Auth::user()->id)->orWhere([['status', 1], ['action', 'Made Order']]);

        $notification->decrement('status');
    }

	public function deletePayment(Request $request, $locale, $id)
    {
    	$paymentGateway = PaymentGateway::findOneById($id);

    	if ($paymentGateway instanceof PaymentGateway) {
    		$paymentGateway->forceDelete();

    		return redirect()->route('list_payments', ['locale' => $locale]);
    	}

    	abort(404);
    }

	public function updatePayment(UpdatePaymentRequest $request, $locale, $id)
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
	    		return redirect()->route('list_payments', ['locale' => $locale]);
	    	}
		}

		abort(404);
	}

	public function editPayment(Request $request, $locale, $id)
	{
		$paymentGateway = PaymentGateway::findOneById($id);

		if ($paymentGateway instanceof PaymentGateway) {
			return view('dashboard.payment.edit_payment', compact('paymentGateway'));
		}

		abort(404);
	}

	public function listpaymentGateway()
	{
		$paymentGateways = PaymentGateway::findAll();

		//if ($paymentGateways->count() > 0) {
			return view('dashboard.payment.list_payments', compact('paymentGateways'));
		//}

		//abort(404);
	}

    public function addPaymentConfig(ConfigPaymentRequest $request)
    {
        $locale = App::getLocale();

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
    			return redirect()->route('list_payments', ['locale' => $locale]);
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
            'width'  => '',
            'height' => '',
        ]);
        return  Cloudder::getResult()['url'];
    }
}
