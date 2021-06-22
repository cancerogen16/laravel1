<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Models\User as UserModel;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
    /**
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(string $provider): string
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param string $provider
     * @param SocialService $service
     * @return Application|RedirectResponse|Redirector
     */
    public function callback(string $provider, SocialService $service)
    {
        try {
            $user = Socialite::driver($provider)->user();

            $userData = UserModel::where('email', $user->getEmail())->first();

            if ($provider == 'facebook') {
                if (!$userData) {
                    UserModel::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => encrypt('admin@123')
                    ]);
                }
            } else {
                if (!$userData) {
                    UserModel::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => encrypt('admin@123')
                    ]);
                }
            }

            return redirect(
                $service->login($user)
            );

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
