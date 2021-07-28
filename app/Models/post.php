<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','user_id'];

    public function post(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsToMany(category::class,'category_posts');
    }
    public function tag(){
        return $this->belongsToMany(tag::class,'post_tags');
    }

}
