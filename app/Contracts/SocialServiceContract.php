<?php declare(strict_types=1);

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface SocialServiceContract
{
    public function login(User $user): string;
}
