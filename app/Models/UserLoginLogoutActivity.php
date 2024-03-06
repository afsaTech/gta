<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLoginLogoutActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'user_id',
        'login_at',
        'logout_at',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = ['rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * A one-to-one relationship.
     * A login/logout activity belongs to a user.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
