<?php

namespace App\Livewire;

use App\Models\category;
use Livewire\Component;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

use Livewire\Features\SupportFileUploads\WithFileUploads;

class BlogPostComponent extends Component
{ 
    use WithFileUploads;

    public $posts;
    public $title;
    public $content;
    public $postId;
    public $role;
    public $image;
    public $active;
    public $category;
    public $category_id;
    // public $tags = '';

    public function mount()
    {
        $this->checkAuthentication();
        $this->loadPosts();
       
    }

    public function createPost()
    {
        $validatedData = $this->validate([
            'title' => 'required|max:30',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,jpg,|max:4048',
            'active' => 'required|',
            'category' => 'required',
            // 'tags' => 'required',
        ]);

        $validatedData['user_id'] = $this->getUserId();

        if ($this->image) {
            $fileName = $this->image->getClientOriginalName();
            $path = $this->image->storeAs('public/photos', $fileName);
            $validatedData['image'] = $fileName;
        }

        $category = Category::firstOrCreate(['category' => $this->category]);

        $post = new Post($validatedData);
        $post->active = $validatedData['active'];
        $post->category_id = $category->id;
        $post->save();

        // $tagsArray = explode(',', $validatedData['tags']);
        // $tags = [];
        // foreach ($tagsArray as $tagName) {
        //     $tag = Tag::firstOrCreate(['tags' => trim($tagName)]);
        //     $tags[] = $tag->id;
        // }
        // $post->tags()->sync($tags);

        
        $this->dispatch('createPosted', id: $post->id);
        // $this->createTags('$postId');
        // $this->resetFields();
      $this->reset(['title','content','image','active','category']);

        $this->loadPosts();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->active = '';
        $this->category = '';
        // $this->tags = '';
    }
    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($this->postId);
        $post->update($validatedData);

        $this->reset(['title', 'content', 'postId']);
        $this->loadPosts();
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->content = $post->content;
    }


    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        $this->loadPosts();
    }


    public function checkAuthentication()
    {
        if (!Auth::check()) {
            session()->flash('success', 'You are not allowed to access. Please login first.');
            return redirect()->to("/");
        }
    }


    public function loadPosts()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            $this->role = $role;
            if ($role === 'admin') {
                $this->posts = Post::all();
            } else {
                $this->posts = Post::where('user_id', $this->getUserId())->get();
            }
        } else {
            session()->flash('error', 'You are not authenticated. Please log in.');
            return redirect()->to("/");
        }
    }


    public function getUserId()
    {
        return Auth::id();
    
    }


    public function render()
    {
        $blogpics = Post::all();
        $categories = category::all();
        return view('livewire.blog-post-component', ['posts' => $this->posts, 'roles' => $this->role, 'blogposts' => $blogpics, 'categories' => $categories]);
    }
}
