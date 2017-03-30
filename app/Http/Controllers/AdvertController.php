<?php

namespace App\Http\Controllers;

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

    }
}
