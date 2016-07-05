<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['name', 'category_id', 'admin_user_id', 'author', 'quantity', 'image', 'publish_year', 'number_of_page', 'created_at', 'updated_at'];
    
    public function  cate () {
        return $this->belongsTo('App/Category', 'category_id');
    }

    public function adminUser () {
        return $this->belongsTo('App/AdminUser', 'admin_user_id');
    }

    public function bookItem () {
        return $this->hasMany('App/BookItem');
    }
}
