<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
	protected $table = 'borrow_details';
	protected $fillable = ['borrow_id', 'book_item_id', 'status', 'start_at', 'expiretime'];
}
