<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppost extends Model
{
    use SoftDeletes;
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function pcat(){
        return $this->belongsTo(Pcat::class, 'pcat_id');
    }
    function ppost_images(){
        return $this->hasMany(PpostImages::class, 'ppost_id');
    }
}
