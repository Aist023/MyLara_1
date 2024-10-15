<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = ['header', 'shortText', 'articl', 'typeID', 'img'];

    public function type(){
        return $this->belongsTo(Type::class, 'typeID');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'newsID');
    }
}