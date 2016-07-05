<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users';

    protected $fillable = ['username', 'password', 'fullname', 'created_at', 'updated_at'];

    protected $hidden = [
        'password'
    ];

    public function cate()
    {
        return $this->hasMany('App/Category');
    }

    public function borrow()
    {
        return $this->hasMany('App/Borrow');
    }

    public function book()
    {
        return $this->hasMany('App/Book');
    }
}
