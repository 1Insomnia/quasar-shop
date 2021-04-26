<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    /**
     * post
     * Handle Post Request
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function post(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ]
        ];
        // Form validation
        $this->validate($request, $rules);
        $request->remember === 'on' ? $remember = true : $remember = false;

        if (!auth()->attempt($request->only('email', 'password'), $remember)) {
            return back()->with('status', 'Invalid login details');
        };

        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    }
}
