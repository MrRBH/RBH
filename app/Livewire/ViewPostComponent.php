<?php

namespace App\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ViewPostComponent extends Component
{
    public $postId;
    public $post;
    public $posts;
    public $liked = false;
    

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->post = Post::findOrFail($postId);
        $this->posts = Post::where('user_id', Auth::id())->get();
        // $this->checkAuthentication();
    }
   

    public function render()
    {
        
        $postsQuery = Post::with('category')
        ->where('active', '=', 'true')
    
        ->orderBy('created_at', 'desc');
        $blogs = $postsQuery->where('created_at', '>', Carbon::now()->subHours(30))->get();
        $blogs = $postsQuery->paginate(3);
        return view('livewire.view-post-component',['blogs'=>$blogs] );

    }
    

    // public function toggleLike()
    // {
    //     $this->liked = true;
    // }


    public function checkAuthentication()
    {
        if (!Auth::check()) {
            session()->flash('success', 'You are not allowed to access. please login first.');
            return redirect()->to("/");
        }
    }
 
}
