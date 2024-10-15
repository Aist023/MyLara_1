<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsUsers extends Model
{
    protected $table = 'newsUsers';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'password'];

    public function comments(){
        return $this->hasMany(Comment::class, 'newsUserID');
    }
}