<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function register(Request $request) {
		$validateData = $request->validate([
			'name' => 'required|max:55',
			'email' => 'email|required|unique:users',
			'password' => 'required'
		]);
		$validateData['password'] = Hash::make($request->password);
		$user = User::create($validateData);
		
		return response(['user' => $user], 201);
	}
    
}
