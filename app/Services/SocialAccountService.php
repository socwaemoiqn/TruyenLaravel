<?php
namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\Models\TaiKhoan;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = TaiKhoan::where('email',$email)
            ->orWhere('ten_tai_khoan',$providerUser->id)
            ->first();

            if (!$user) {

                $user = TaiKhoan::create([
                    'email' => $email,
                    'ten_tai_khoan' => $providerUser->getId(),
                    'mat_khau' => $providerUser->token,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}