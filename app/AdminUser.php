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

    protected $fillable = ['username', 'password', 'fullname', 'created_at', 'updated_at'];

    protected $hidden = [
        'password'
    ];

    /**
     * Get all category for AdminUser .
     *
     * @return array
     */
    public function cate()
    {
        return $this->hasMany('App/Category');
    }

    /**
     * Get all borrow for AdminUser.
     *
     * @return array
     */
    public function borrow()
    {
        return $this->hasMany('App/Borrow');
    }

    /**
     * Get all book for AdminUser.
     *
     * @return array
     */
    public function book()
    {
        return $this->hasMany('App/Book');
    }
}