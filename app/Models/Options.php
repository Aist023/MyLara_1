<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $table = 'options';
    protected $primaryKey = 'id';
    protected $fillable = ['questionID', 'option'];

    public function question(){
        return $this->belongsTo(Questions::class, 'questionID');
    }
}