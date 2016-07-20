<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username', 'password', 'admin_user_id', 'fullname', 'gender', 'birthday', 'phone', 'address', 'expiretime', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get borrow from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrows()
    {
        return $this->hasMany('App\Borrow');
    }

    /**
     * Get the adminUser that owns the User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser', 'admin_user_id');
    }
}
