<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\CommonMigrationColumns;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Auditable, CommonMigrationColumns, HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = ['name', 'email', 'username', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = ['password', 'remember_token', 'rsvd_1', 'rsvd_2', 'rsvd_3', 'rsvd_4', 'rsvd_5'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get and set the user's first name attribute, ensuring it is capitalized when retrieved.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }

    /**
     * Check if the user has seen the intro and is a registered member.
     *
     * @return bool
     */
    public function isRegisteredMember()
    {
        return $this->has_seen_intro;
    }

    /**
     * Set the password attribute and encrypt the value.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * A one-to-many relationship.
     * A user generates one or many logs.
    */
    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    /**
     * A one-to-many relationship.
     * A user receives one or many notifications.
    */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'auth_id');
    }

    /**
     * Get the unread notifications for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }

    /**
     * A one-to-many relationship.
     * A user has one or many login/logout activities.
    */
    public function loginlogoutActivities()
    {
        return $this->hasMany(UserLoginLogoutActivity::class);
    }

}
