<?php

namespace App\Livewire;

use App\Models\category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $search;

    public $category;
    public $tags;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {


        $tags = Tag::all();
        $postsQuery = Post::with('category')
            ->where('active', '=', 'true')

            ->orderBy('created_at', 'desc');


        $BlogsQuery = Post::where('active', '=', 'true')
            ->where('category', 'like', "%{$this->category}%")
            ->orderBy('created_at', 'desc');



        if ($this->search) {
            $postsQuery->where('title', 'like', "%{$this->search}%");
        }


        if ($this->tags) {

            $BlogsQuery->whereHas('tags', function ($query) {
                $query->where('tags', 'like', "%{$this->tags}%");
            });
        }


        $blogs = $postsQuery->where('created_at', '>', Carbon::now()->subHours(12))->get();

        $posts = $BlogsQuery->paginate(3);
        $blogs = $postsQuery->paginate(3);


        return view('livewire.show-posts', ['posts' => $posts, 'blogs' => $blogs, 'poststag' => $tags]);
    }
}
