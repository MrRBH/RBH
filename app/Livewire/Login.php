<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function index()
    {
        return view('livewire.login');
    }

    public function customLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = User::where('email', $this->email)->first();
    
        if(!$user){
            session()->flash('success','Please register first');
            return;
        }
        elseif (!Hash::check($this->password, $user->password)) {
            session()->flash('success', 'Invalid email or password.');
            return;
        }
      
    
        Auth::login($user); 
        if($user->role =='admin') {
            session()->flash('success', ' You are login as a Admin ');
            return redirect()->to('livewire.dashboard');
            
        }elseif($user->role=='user')
        session()->flash('success', 'You are Login as a User');
        return redirect()->to('livewire.dashboard');
    }

    public function signOut()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
  
    public function render()
    {
        return view('livewire.login');
    }
}
