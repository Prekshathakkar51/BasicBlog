<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = $validator->validated();

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            // if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'redirect' => url('/'),
                ]);
            // }

            // return redirect()->intended('/');
        }

        // if ($request->ajax()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Invalid credentials'
        //     ], 422);
        // }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password',
        ], 422);
    }

    // throw ValidationException::withMessages([
    //     'email' => 'The provided credentials do not match our records.',
    // ]);

    // if (Auth::attempt($credentials, $request->boolean('remember'))) {
    //     $request->session()->regenerate();
    //     return redirect()->intended('/')->with('success', 'Welcome back!');
    // }

    // return back()
    //     ->withErrors(['email' => 'The provided credentials do not match our records.'])
    //     ->onlyInput('email');
}
