<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function comment(){
        return $this->hasMany(related:Comment::class,foreignKey:'post_id');
    }
}
