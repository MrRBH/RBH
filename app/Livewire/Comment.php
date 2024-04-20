<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $postId;
    public $editingCommentId;
public $editedComment;


    protected $rules = [
        'comment' => 'required',
    ];

    public function render()
    {
        // Fetch comments for the current post
        $comments = ModelsComment::where('post_id', $this->postId)->get(); 
        return view('livewire.comment', ['comments' => $comments]);
    }
   

    public function postComment()
    {
        if (!Auth::check()) {
            session()->flash('success', 'You are not allowed to comment. Please login first.');
            return redirect(route('livewire.login',true));
        }
        $this->validate();

        $user = Auth::user();

        ModelsComment::create([
            'comment' => $this->comment,
            'user_id' => optional($user)->id,
            'post_id' => $this->postId,
        ]);


        $this->reset(['comment']);
    }
    public function deleteComment($commentId){
      ModelsComment::findOrFail($commentId)->delete();
    
    }
    public function editComment($commentId)
    {
        $this->editingCommentId = $commentId;
        $this->editedComment = ModelsComment::findOrFail($commentId)->comment;
    }
    
    public function saveComment($commentId)
    {
        $this->validate(['editedComment' => 'required']);
        $comment = ModelsComment::findOrFail($commentId);
        
        // Check if the authenticated user is the owner of the comment
        if(Auth::user()){
            $comment->update(['comment' => $this->editedComment]);
            session()->flash('success', 'Comment updated successfully.');
        } else {
            session()->flash('error', 'You are not authorized to update this comment.');
        }
        
        $this->reset(['editingCommentId', 'editedComment']);
    }
 
}
