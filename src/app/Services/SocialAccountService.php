<?php
namespace App\Services;
use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser($provider, ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $user = User::where('email', $providerUser->getEmail())->first();

            if ($user) {
              return $user;
            }

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);
            $user = User::create([
                'user_name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
            ]);
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
