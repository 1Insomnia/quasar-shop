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
     * @return void
     */
    public function post(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
//                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ]
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
//            return back to the last page with flash message to session
            return back()->with('status', 'Invalid login details');
        };

        if (auth()->user()->isAdmin()) {
            return redirect("admin/dashboard");
        } else {
            return redirect()->route('home');
        }
    }
}