<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow_detail extends Model
{
	protected $table = 'borrow_details';
	protected $fillable = ['borrow_id', 'book_item_id', 'status', 'start_at', 'expiretime'];
}
