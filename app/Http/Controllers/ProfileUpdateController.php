<?php

namespace App\Http\Controllers;

use Cloudder;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileUpdateController extends Controller
{
    public function updateProfile(Request $request)
    {
    	$email = $request->email;
    	$oldPassword = $request->password;
        $newPassword = $request->confirm_password;

    	$user = User::findOneByEmail($email);

    	if ($user instanceof User) {
    		$user->phone = $request->phone;
    		$user->gender = $request->gender;
    		$user->name = $request->name;

    		if ($request->file('photo') != '') {
    			$user->profile_picture = $this->handleCloudinaryFileUpload($request);
    		}

    		if ($oldPassword != '') {
    			if (\Hash::check($oldPassword, $user->getAuthPassword())) {
    				$user->password = bcrypt($newPassword);
    			} else {
    				return redirect('home')
                    ->withErrors(['Both passwords is incorrect'])
                    ->withInput();
                }
    		}

    		$user->save();
    	}


    	return redirect('home');
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
