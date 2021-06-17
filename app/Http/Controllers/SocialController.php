<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

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
        $user = Socialite::driver($provider)->user();

        if ($user) {
            return redirect(
                $service->login(
                    $user
                ));
        } else {
            return redirect(route('login'));
        }
    }
}
