<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    protected $table = 'book_items';

    protected $fillable = ['book_id', 'created_at', 'updated_at'];

    // The book that belong to the bookItem
    public function book()
    {
        return $this->belongsTo('App/Book', 'book_id');
    }

    // The borrowDetail hasMany the bookItem
    public function borrowDetail() 
    {
        return $this->hasMany('App/BorrowDetail');
    }
}
