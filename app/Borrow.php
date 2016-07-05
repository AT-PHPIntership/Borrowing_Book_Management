<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'borrows';

    protected $fillable = ['user_id', 'admin_user_id', 'quantity', 'expiretime', 'created_at', 'updated_at'];

    /**
     * Get the user that owns the Borrow.
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App/User', 'user_id');
    }

    /**
     * Get the adminUser that owns the Borrow.
     *
     * @return array
     */
    public function adminUser()
    {
        return $this->belongsTo('App/AdminUser', 'admin_user_id');
    }

    /**
     * Get borrowDetail from Borrow.
     *
     * @return array
     */
    public function borrowDetail()
    {
        return $this->hasMany('App/BorrowDetail');
    }
}
