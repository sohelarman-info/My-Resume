<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pcat extends Model
{
    use SoftDeletes;
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function Ppost(){
        return $this->hasMany(Ppost::class, 'pcat_id');
    }
}
