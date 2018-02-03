<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;



class SocialAuthFacebookController extends Controller {
    public function redirect($data = null) {
        if (!auth()->check()) {
            if($data != null) {
                return Socialite::driver('facebook')->stateless()->with(["state" => $data])->redirect();
            }
            return Socialite::driver('facebook')->stateless()->redirect();
        }
        else {
            // Authenticated
            if($data != null) {
                $redirect = json_decode(base64_decode($state))->redirect_url;
                return redirect()->to($redirect.'#'.base64_encode("qwerty"));
            }
            return redirect()->to('/home');
        }
    }

    public function callback(SocialFacebookAccountService $service) {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
        auth()->login($user);

        $state = request()->input("state");
        if($state != "") {
            $redirect = json_decode(base64_decode($state))->redirect_url;
            return redirect()->to($redirect.'#'.base64_encode("qwerty"));
        }
        return redirect()->to('/home');
    }
}
