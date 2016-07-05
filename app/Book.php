<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'category_id', 'admin_user_id', 'author', 'quantity', 'image', 'publish_year', 'number_of_page', 'created_at', 'updated_at'];
}
