<?php

namespace App\Livewire;

use App\Models\data;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    // public function index(){
    //     return Post::find()->retrive;
    //     // return data::all();
    // }
    public function render()
    {
        return view('livewire.table');
    }
}
