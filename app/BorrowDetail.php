<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'borrow_details';

    protected $fillable = ['borrow_id', 'book_item_id', 'status', 'expiretime'];

    /**
     * Get the borrow that owns the BorrowDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function borrow()
    {
        return $this->belongsTo('App\Borrow', 'borrow_id');
    }

    /**
     * Get the bookItem that owns the BorrowDetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookItem()
    {
        return $this->belongsTo('App\BookItem', 'book_item_id');
    }
}
