<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'books';

    protected $fillable = ['name', 'category_id', 'admin_user_id', 'author', 'quantity', 'image', 'publish_year', 'number_of_page'];
    
    /**
     * Get the cate that owns the book .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * Get the adminUser that owns the book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser', 'admin_user_id');
    }

    /**
     * Get all bookItem for book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookItems()
    {
        return $this->hasMany('App\BookItem');
    }
}
