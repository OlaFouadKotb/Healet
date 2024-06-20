<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // This assumes your login form view is in resources/views/auth/login.blade.php
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply 'guest' middleware to handle showing the login form and submitting credentials
        $this->middleware('guest')->except('logout');
        
        // Apply 'auth' middleware to allow only authenticated users to access the logout functionality
        $this->middleware('auth')->only('logout');
    }

    /**
     * Validate the user's login credentials.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Determine if the user input is an email address
        $loginField = filter_var($request->userName, FILTER_VALIDATE_EMAIL) ? 'email' : 'userName';

        // Return the validated credentials
        return [
            $loginField => $request->userName,
            'password' => $request->password,
        ];
    }
}
