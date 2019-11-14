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
            $user = TaiKhoan::where('email',$email)->first();

            if (!$user) {

                $user = TaiKhoan::create([
                    'email' => $email,
                    'ten_tai_khoan' => $providerUser->getName(),
                    'mat_khau' => $providerUser->getName(),
                    'trang_thai' => 1,
                    'tai_khoan_vai_tro_id' => 3
                ]);
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}