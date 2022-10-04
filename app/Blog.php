<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function category(){
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    function sub_category(){
        return $this->belongsTo(BlogSubCategory::class, 'subcategory_id');
    }
}
