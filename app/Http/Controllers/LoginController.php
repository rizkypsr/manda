<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->roles == 'admin') {
                dd('admin');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username atau password salah');
        }
    }
}
