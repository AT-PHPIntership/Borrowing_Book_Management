<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_item extends Model
{
	protected $table = 'book_items';
	protected $fillable = ['book_id', 'admin_user_id', 'created_at', 'updated_at'];
}
