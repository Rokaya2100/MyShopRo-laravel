<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate( [
            'fname'   => ['required', 'string', 'max:255'],
            'lname'   => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'   => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city'    => ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'min:8', 'confirmed']
        ]);

        if(!$validated){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
            ], 403);
        }
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city'   => $request->city,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        $data['token'] = $user->createToken($request->email)->plainTextToken;
        $data['user'] = $user;
        $response = [
            'status' => 'success',
            'message' => 'User is created successfully.',
            'data' => $data,
        ];
        return response()->json($response, 201);
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'   => ['required','string','email'],
            'password'=> ['required','string']
        ]);
        if(!$validated){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $request->errors(),
            ], 403);
        }
        // Check email exist
        $user = User::where('email', $request->email)->first();

        // Check password
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid credentials'
                ], 401);
        }
        $data['token'] = $user->createToken($request->email)->plainTextToken;
        $data['user'] = $user;
        $response = [
            'status' => 'success',
            'message' => 'User is logged in successfully.',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        if($user){
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
            ], 200);
        }else{
        return response()->json([
            'status' => 'failed',
            'message' => 'User is not found!'
            ], 404);
        }
    }
}
