<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['typeName'];
}