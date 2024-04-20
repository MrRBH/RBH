<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data extends Model
{
    use HasFactory;
    // protected $primarykey = 'id';
    public function retrive(){
        return $this->hasMany(Post::class,'email');
        
        
    }
  
}
