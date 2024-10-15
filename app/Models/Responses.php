<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    protected $table = 'responses';
    protected $primaryKey = 'id';
    protected $fillable = ['optionID', 'newsUserID'];

    public function user(){
        return $this->belongsTo(NewsUsers::class, 'newsUserID');
    }

    public function option(){
        return $this->belongsTo(Options::class, 'optionID');
    }
}