<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Cloudder;
use App\Advert;
use App\Product;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertRequest;

class AdvertController extends Controller
{
    public function deleteAdvert(Request $request, $id)
    {
        $user = Advert::findOneById($id);

        if ($user instanceof Advert) {
            $user->forceDelete();

            return redirect()->route('list_adverts');
        }

        throw new Exception('Advert with this id not found');
    }

	public function listAdverts()
    {
    	$adverts = Advert::orderBy('id', 'DESC')->paginate(10);
        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])
            ->groupBy('id', 'created_at')
            ->orderBy('created_at', 'DESC');

        $buyerNotification = Notification::where([
            ['status', 1], 
            ['action', 'Login succesfully']
        ])->orWhere([
            ['status', 1], 
            ['action', 'Approve Order']
        ])->groupBy('id', 'created_at')
            ->orderBy('created_at', 'DESC');

        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('dashboard.advert.list_adverts', compact('adverts', 'paymentGateways', 'amount', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }

    public function loadAdvertForm()
    {
        $products = product::all();
        $adminNotification = Notification::where([['status', 1], ['action', 'Made Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $buyerNotification = Notification::where([['status', 1], ['action', 'Login succesfully']])->orWhere([['status', 1], ['action', 'Approve Order']])->groupBy('id', 'created_at')->orderBy('created_at', 'DESC');
        $adminNotifications = $adminNotification->get();
        $buyerNotifications = $buyerNotification->get();
        $adminNotificationCount = $adminNotification->count();
        $buyerNotificationCount = $buyerNotification->count();

    	return view('dashboard.advert.add_advert', compact('products', 'paymentGateways', 'amount', 'adminNotifications', 'buyerNotifications', 'buyerNotificationCount', 'adminNotificationCount'));
    }

    public function uploadAdvert(AdvertRequest $request)
    {
    	if (count($request->file('images')) > 0) {
    		$advert = Advert::create([
    			'user_id'       => Auth()->user()->id,
                'product_id'    => $request->product,
    			'advert_photos' => $this->uploadProductImage($request),
    		]);

    		if ($advert instanceof Advert) {
    			return redirect()->route('list_adverts');
    		}
    	}

    	abort(503);
    }

    /**
     * Upload product image to cloudinary
     *
     * @param $request
     * @return mixed
     */
    public function uploadProductImage($request)
    {
        $cloudinaryWrapper = [];
        $urls = [];

        foreach ($request['images'] as $key => $image) {
            $result = Cloudder::upload($image, null, [
                'format' => 'jpg',
                'crop'   => 'fill',
                'width'  => 270,
                'height' => '',
            ]);

            array_push($cloudinaryWrapper, $result);
        }

        foreach ($cloudinaryWrapper as $key => $value) {
            array_push($urls, $value->getResult()['url']);
        }

        return json_encode($urls);
    }

    /**
     * Display/Undisplay advert
     *
     * @param $id
     *
     * @return mixed
     */
    public function displayAdvert(Request $request, $id)
    {
        $advert = Advert::find($id);

        if ($advert->status === 0) {
            $advert->increment('status');

            return redirect()->route('list_adverts');
        } else {
            $advert->decrement('status');

            return redirect()->route('list_adverts');
        }
    }
}
