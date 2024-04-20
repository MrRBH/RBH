<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
// use Session;
use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Livewire\Attributes\Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !FacadesHash::check($request->password, $user->password)) {
            return redirect("login")->withInput($request->only('email'))->withSuccess('Invalid email or password. ');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return redirect('dashboard')->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function registration()
    {
        return view('auth.register');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password'])
        ]);
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("dashboard")->withSuccess('You are not allowed to access please login first');
    }
    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function welcome()
    {
        if (Auth::check()) {

            return view('welcome');
        }
        return redirect("login")->withSuccess('You are not allowed to access please login first');
    }
}

