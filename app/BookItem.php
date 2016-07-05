<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'book_items';

    protected $fillable = ['book_id', 'created_at', 'updated_at'];

    /**
     * Get the book that owns the BookItem.
     *
     * @return array
     */
    public function book()
    {
        return $this->belongsTo('App/Book', 'book_id');
    }

    /**
     * Get the borrowDetail from BookItem.
     *
     * @return array
     */
    public function borrowDetail()
    {
        return $this->hasMany('App/BorrowDetail');
    }
}