<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    function sub_category(){
        return $this->hasMany(BlogSubCategory::class, 'category_id');
    }
    function blog_category(){
        return $this->hasMany(Blog::class, 'category_id');
    }
    function blog_subcategory(){
        return $this->hasMany(Blog::class, 'subcategory_id');
    }
}
