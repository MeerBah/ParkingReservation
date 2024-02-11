<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie as FacadesCookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if($request->has('rememberme')){
            FacadesCookie::queue('email', $request->email,1440);
            FacadesCookie::queue('password', $request->password,1440);
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {

            $user = DB::table('users')->where('email', $request->email)->first();

            return redirect()->intended('parking')->withSuccess('Signed in');

        }
        
        return redirect()->back()->with('email','Wrong email / password');
    }

    public function register(Request $request)
    {           
        $this->validate(request(), [
            'name' => 'required',
            'email1' => 'required|string|email',
            'password1' => 'required'
        ]);

        $register = User::where('email', $request['email'])
        ->count();
        
        if($register != 0){
            return redirect()->back()->with('register','Email already exist');
        }
        
        $user = User::create([
        'name' => $request['name'],
        'email' => $request['email1'],
        'password' => Hash::make($request['password1']),
      ]);
        
        auth()->login($user);
        
        return redirect()->to('parking');   
    } 

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
