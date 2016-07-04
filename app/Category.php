<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $fillable = ['admin_user_id', 'name', 'created_at', 'updated_at'];
}
