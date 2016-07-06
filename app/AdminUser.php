<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admin_users';

    protected $fillable = ['username', 'password', 'fullname'];

    protected $hidden = [
        'password'
    ];

    /**
     * Get all category for AdminUser .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App/Category');
    }

    /**
     * Get all borrow for AdminUser.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrows()
    {
        return $this->hasMany('App/Borrow');
    }

    /**
     * Get all book for AdminUser.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App/Book');
    }
}
