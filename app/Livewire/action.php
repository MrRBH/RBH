<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Action extends Component
{
    #[Title('action')]


    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    
    public function render()
    {
        return view('livewire.action');
    }
}
