<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpostImages extends Model
{
    use SoftDeletes;
    function ppost(){
        return $this->belongsTo(ppost::class, 'ppost_id');
    }
}
