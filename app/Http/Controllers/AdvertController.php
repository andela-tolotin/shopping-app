<?php

namespace App\Http\Controllers;

use Auth;
use Cloudder;
use App\Advert;
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
    	$adverts = Advert::orderBy('id', 'DESC')
    	   ->paginate(10);

    	return view('dashboard.advert.list_adverts', compact('adverts'));
    }

    public function loadAdvertForm()
    {
    	return view('dashboard.advert.add_advert');
    }

    public function uploadAdvert(AdvertRequest $request)
    {
    	if (count($request->file('images')) > 0) {
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