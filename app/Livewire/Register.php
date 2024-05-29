<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $role; 
    // public $key;

    public function customRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);
       

        
   
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role 
        ]);

   Auth::login($user); 

        if($user->role =='admin') {
            session()->flash('success', ' You are login as a Admin ');
            return redirect()->to('livewire.dashboard');
            
        }elseif($user->role=='user')
        session()->flash('success', 'You are Login as a User');
        return redirect()->to('livewire.dashboard');
     
        if ($user) {
            
            return redirect()->to("livewire.dashboard");
        } else {
          
            // sleep(10);
            return redirect()->to("blog.posts");
        }
    }

    public function updateRole()
    {
        
    }



    public function render()
    {
        return view('livewire.register');
    }
}
