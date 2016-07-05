<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';
    protected $fillable = ['user_id', 'admin_user_id', 'quantity', 'expiretime', 'created_at', 'updated_at'];
}
