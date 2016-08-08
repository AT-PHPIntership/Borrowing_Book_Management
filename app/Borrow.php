<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Borrow extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'borrows';

    protected $fillable = ['user_id', 'admin_user_id', 'quantity', 'expiretime'];

    /**
     * Get the user that owns the Borrow.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the adminUser that owns the Borrow.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser()
    {
        return $this->belongsTo('App\AdminUser', 'admin_user_id');
    }

    /**
     * Get borrowDetail from Borrow.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrowDetails()
    {
        return $this->hasMany('App\BorrowDetail');
    }

    /**
     * Update batch borrow.
     *
     * @param int $data input
     *
     * @return \Illuminate\Database\Eloquent\Collections
     */
    public static function updateBorrow($data)
    {
        $updateArray = array_count_values($data);
        $ids = implode(',', array_keys($updateArray));
        $sql = "UPDATE borrows SET quantity = CASE id";
        foreach ($updateArray as $keys => $value) {
            $sql .= sprintf(" WHEN %d THEN quantity-%d ", $keys, $value);
        }
        $sql .= "END WHERE id IN ($ids);";
        return DB::update($sql);
    }
}
