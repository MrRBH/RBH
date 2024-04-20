<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Likebutton extends Component
{
    public $post;
    public $liked;
    public $likesCount;

    public function mount()
    {
        // if(!Auth::user()){
        //     return redirect(route('livewire.login'));
        // }
        if (Auth::check()) {
            $user = Auth::user();
            $this->liked = $this->post->likes()->where('user_id', $user->id)->exists();
        } else {
            $this->liked = false;
        }
        $this->likesCount = $this->post->likes()->count();
    }

    public function like()
    {
        if(!auth()->user()){
            $this->redirect(Login::class);

        }
        if (Auth::check()) {
            $user = Auth::user();

            if (!$this->liked) {
                $this->post->likes()->attach($user->id);
                $this->liked = true;
                $this->likesCount++;
            } else {
                $this->post->likes()->detach($user->id);
                $this->liked = false;
                $this->likesCount--;
            }
        } else {
            // return  
            //     $this->redirect(Login::class);
        }
    }

    public function render()
    {
        return view('livewire.likebutton');
    }
}
