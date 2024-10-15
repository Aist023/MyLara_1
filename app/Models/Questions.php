<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = ['header', 'question', 'datefinish'];
}