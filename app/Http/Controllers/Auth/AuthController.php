<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('auth:sanctum', ['except' => ['login']]);
    }

    /**
     * Authenticate Login attempt, preceded by resending token.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        $tokenName = request('device_name') ?? '';

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $sanctumToken = request()->user()->createToken($tokenName);

        return $this->respondWithToken($sanctumToken->plainTextToken, 201);
    }

    /**
     * Get the authenticated User Based on their Bearer Token.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        // Delete previous token
        request()->user()->currentAccessToken()->delete();
        $tokenName = request('device_name') ?? '';

        // Generate New
        $sanctumToken = request()->user()->createToken($tokenName);

        return $this->respondWithToken($sanctumToken->plainTextToken, 201);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @param int $httpCode = 200
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token, $httpCode = 200)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Config::get('sanctum.expiration', 60),
        ], $httpCode);
    }
}
