<?php 

namespace App\Http\Services;

use App\Http\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Auth;
use Kyojin\JWT\Facades\JWT;

class UserService implements IUserService {
    public function authenticate(array $credentials): string
    {
        if (!Auth::attempt($credentials)) {
            throw new \Exception('Invalid credentials');
        }

        $user = Auth::user();
        $payload = [
            'sub' => $user->id,
            'role' => $user->role->name,
        ];

        return JWT::encode($payload);
    }

    public function logout(): void
    {
        // Invalidate the current token (Kyojin/JWT handles blacklisting internally if configured)
        JWT::invalidate(JWT::getToken());
        Auth::logout();
    }
}