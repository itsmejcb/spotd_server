<?php

namespace App\Http\Controllers\SignIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignIn\AuthRequest;
use App\Services\SignIn\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function auth(AuthRequest $request)
    {
        $user = $this->authService->authenticate($request->validated());

        if (!$user) {
            return response()->json(['message' => 'error occurred']);
        }

        $token = $this->authService->generateAccessToken($user);

        return $request->jsonResponse($user, $token);

    }

    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request->user());

        return response()->json(['message' => 'Logged out successfully']);
    }
}
