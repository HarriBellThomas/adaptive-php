<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;
use GuzzleHttp\Exception\ClientException;

class SocialAuthController extends Controller {
    public function redirect($provider, $data = null) {
        if (!auth()->check()) {
            if($data != null) {
                return Socialite::driver($provider)->stateless()->with(["state" => $data])->redirect();
            }
            return Socialite::driver($provider)->stateless()->redirect();
        }
        else {
            // Authenticated
            if($data != null) {
                $redirect = json_decode(base64_decode($data))->redirect_url;
                return redirect()->to($redirect.'#'.base64_encode('{"user_id":"'. auth()->user()->id .'", "style_id":""}'));
            }
            return redirect()->to('/home');
        }
    }

    public function callback($provider, SocialAccountService $service) {
      try {
        $user = $service->createOrGetUser($provider, Socialite::driver($provider)->stateless()->user());
        auth()->login($user);

        $state = request()->input("state");
        if($state != "") {
            $redirect = json_decode(base64_decode($state))->redirect_url;
            return redirect()->to($redirect.'#'.base64_encode('{"user_id":"'.$user->id.'", "style_id":""}'));
        }
        return redirect()->to('/home');
      } catch (ClientException $e) {
        return redirect()->to('/')->with(['permissions' => 'In order to use this site with the Facebook app, you must allow it to continue.']);
      }
  }
}
