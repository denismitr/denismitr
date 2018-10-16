<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AdminNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    const REDIRECT_TO_ROUTE = 'admin.dashboard';

    public function show()
    {
        return view('admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        try {
            $admin = User::getAdmin($request->input('email'));
        } catch (AdminNotFound $e) {
            return $this->authenticationFailed("User not found!");
        }

        if ( ! Hash::check($request->input('password'), $admin->password) ) {
            return $this->authenticationFailed("Authentication failed!");
        }

        auth()->login($admin, !! $request->input('remember'));

        $admin->justLoggedIn();

        return redirect()->route(self::REDIRECT_TO_ROUTE);
    }

    public function logout()
    {
        auth()->logout();

        session()->regenerate(true);

        return redirect('/');
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticationFailed(string $message)
    {
        return back()->withErrors([
            'email' => $message,
        ])->withInput();
    }
}
