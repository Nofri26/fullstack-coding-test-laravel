<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\View\View;

class UserController extends Controller
{
	public function loginForm(): View
	{
		return view('pages.login');
    }

	public function login(UserRequest $request): View
	{
		$data = $request->validated();
		return view('welcome', [
			'content' => $data['name']
		]);
	}
}
