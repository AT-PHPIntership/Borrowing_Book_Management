<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    protected $table = 'admin_users';
    protected $fillable = ['username', 'password', 'fullname', 'created_at', 'updated_at'];
    protected $hidden = [
        'password'
    ];
}