<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';

    protected $fillable = ['user_id', 'admin_user_id', 'quantity', 'expiretime', 'created_at', 'updated_at'];

    public function user () {
        return $this->belongsTo('App/User', 'user_id');
    }

    public function adminUser () {
        return $this->belongsTo('App/AdminUser', 'admin_user_id');
    }

    public function borrowDetail () {
        return $this->hasMany('App/BorrowDetail');
    }
}
