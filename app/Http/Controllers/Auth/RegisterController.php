<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Route;

class RegisterController extends Controller
{
    public function __construct()
    {
        // Register Controller is reseved for guest users
        $this->middleware(['guest']);
    }

    /**
     * index
     * Show the register page
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'min:6',
//                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed',
            ],
        ];
        // Validation
        $this->validate($request, $rules);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => User::DEFAULT_ROLE,
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route("home");
        }
    }
}
