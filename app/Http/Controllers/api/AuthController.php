<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\AuthLoginRequest;
use App\Http\Requests\api\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function __construct(protected User $user) {}

	public function register(AuthRegisterRequest $request): JsonResponse
	{
		$data = $request->validated();
		$user = $this->user->query()->create($data);

		return response()->json([
			'message' => 'User successfully registered',
			'data' => new UserResource($user),
		]);
    }

	public function login(AuthLoginRequest $request): JsonResponse
	{
		$data = $request->validated();
		$user = $this->user->query()->where('email', $data['email'])->first();
		if (!$user || !Hash::check($data['password'], $user->password)) {
			return response()->json([
				'message' => 'The provided credentials are incorrect.',
				'errors' => [
					'email' => ['The provided credentials are incorrect.'],
				]
			]);
		}
		auth()->login($user);
		$token = $user->createToken($user->email)->plainTextToken;

		return response()->json([
			'message' => 'User successfully logged in',
			'data' => new UserResource($user),
			'token' => $token,
		]);
	}

	public function logout(): JsonResponse
	{
		$user = auth()->user();
		$user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

		return response()->json([
			'message' => 'User successfully logged out',
			'data' => true
		]);
	}
}
