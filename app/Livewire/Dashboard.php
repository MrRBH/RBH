<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{


    public function mount()
    {
        $this->checkAuthentication();
    }

    public function checkAuthentication()
    {
        if (!Auth::check()) {
            session()->flash('success', 'You are not allowed to access. please login first.');
            return redirect()->to("/");
        }
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
