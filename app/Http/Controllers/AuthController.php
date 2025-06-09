<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\Interfaces\IUserService;
use Illuminate\Http\JsonResponse;
use Kyojin\JWT\Facades\JWT;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $token = $this->userService->authenticate($credentials);

            return response()->json([
                'status' => 'success',
                'token' => $token,
                'user' => Auth::user(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials or error occurred',
                'error' => $e->getMessage(),
            ], 401);
        }
    }

    public function logout(): JsonResponse
    {
        try {
            $this->userService->logout();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Logout failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function refresh(): JsonResponse
    {
        try {
            $newToken = $this->userService->refresh();
            return response()->json([
                'status' => 'success',
                'token' => $newToken,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token refresh failed',
                'error' => $e->getMessage(),
            ], 401);
        }
    }
}