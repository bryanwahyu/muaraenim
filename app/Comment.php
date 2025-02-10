<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function post(){
        return $this->belongsTo(related:Post::class,foreignKey:'post_id');
    }
}
