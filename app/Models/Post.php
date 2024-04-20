<?php

namespace App\Models;

use App\Livewire\Likebutton;
use CreatecategoryPostTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\CommonMark\Reference\Reference;
use Spatie\Tags\HasTags;

class Post extends Model

{
    
    // public $timestamps = false;
    protected $fillable = [
        'title', 'content', 'user_id','image','active','category'
    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id')->withTimestamps();
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    

}
