<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use Auditable, HasFactory, SoftDeletes;
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = ['rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * A one-to-one relationship.
     * A log belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The attributes that should be formated to human readable format.
     *
     * @var array
    */
    public function getFormattedDateAttribute()
    {
        $date = $this->action == 'created' ? $this->created_at : $this->updated_at;
        return Carbon::parse($date)->diffForHumans();
    }
}
