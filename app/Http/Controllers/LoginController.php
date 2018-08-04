<?php

namespace App\Http\Controllers;

use App\Exceptions\AdminNotFound;
use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    const REDIRECT_TO_ROUTE = 'admin';

    public function show()
    {
        return view('admin.login');
    }

    public function login(AdminLoginRequest $request)
    {
        try {
            $admin = User::getAdmin($request->input('email'));
        } catch (AdminNotFound $e) {
            return $this->authenticationFailed();
        }

        if ( ! Hash::check($request->input('password'), $admin->password) ) {
            return $this->authenticationFailed();
        }

        auth()->login($admin, !! $request->input('remember'));

        $admin->justLoggedIn();

        return redirect()->route(self::REDIRECT_TO_ROUTE);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticationFailed()
    {
        return back()->withErrors([
            'auth' => "Authentication failed!"
        ])->withInput();
    }
}
