<?php

namespace App\Http\Controllers;

use Auth;
use Cloudder;
use App\Advert;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertRequest;

class AdvertController extends Controller
{
    public function loadAdvertForm()
    {
    	return view('dashboard.advert.add_advert');
    }

    public function uploadAdvert(Request $request)
    {
    	if ($request->has('photo')) {
    		$advert = Advert::create([
    			'user_id' => Auth()->user()->id,
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
                'width'  => 1280,
                'height' => 768,
            ]);

            array_push($cloudinaryWrapper, $result);
        }

        foreach ($cloudinaryWrapper as $key => $value) {
            array_push($urls, $value->getResult()['url']);
        }

        return json_encode($urls);
    }
}
