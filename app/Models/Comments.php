<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['newsUserID', 'newsID', 'comment', 'date'];

    public function user(){
        return $this->belongsTo(User::class, 'newsUserID');
    }
    public function news(){
        return $this->belongsTo(News::class, 'newsID');
    }
}