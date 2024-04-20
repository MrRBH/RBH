<?
// app/Http/Livewire/QueryForm.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Form extends Component
{
    public $name;
    public $email;
    public $password;
    public $message='important';

    public function storeUser()
    {
        // Validate the form input
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Store the user in the database
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Clear the form inputs
        $this->reset(['name', 'email', 'password']);
    }

    public function render()
    {
        return view('livewire.query-form');
    }
}
