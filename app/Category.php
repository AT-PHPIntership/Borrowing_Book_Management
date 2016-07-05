<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';

    protected $fillable = ['admin_user_id', 'name', 'created_at', 'updated_at'];

    /**
     * Get the adminUser that owns the Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo('App/AdminUser', 'admin_user_id');
    }
    /**
     * Get book from Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App/Book');
    }
}
