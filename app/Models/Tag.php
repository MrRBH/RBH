<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tags'];
    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tags','post_id','tag_id')->withTimestamps();;
    } 
    // mutoter
    public function setTagsAttribute($value)
    {
      
        $tags = preg_split('/[\,]+/', $value);
      
        $tags = array_map(function($tag) {
            return '#' . $tag;
        }, $tags);
      
        
       
        $this->attributes['tags'] = implode(',', $tags); 
    }
    
    public function getTagsAttribute()
    {
        return $this->attributes['tags'];
       
    }
    
}

