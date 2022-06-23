<?php

namespace Domains\Auth\Models;

use Domains\Course\Models\UserCourse;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Altek\Accountant\Contracts\Recordable;
use Lab404\Impersonate\Models\Impersonate;
use Domains\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Domains\Auth\Notifications\ResetPasswordNotification;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class User extends Authenticatable implements Recordable, MustVerifyEmail
{
    use HasRoles;
    use Notifiable;
    use Impersonate;
    use MustVerifyEmailTrait;
    use \Altek\Accountant\Recordable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'active',
        'account_type',
        'state',
        'state_code',
        'avatar',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'email_verified_at',
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
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * attributes appended to the model instance.
     *
     * @var array
     */
    protected $appends = [
        'roles_label',
    ];

    /**
     *
     * Get Account types
     */
    public static $TYPES = [
        'STAFF' => 'STAFF'
    ];

    /**
     * Send the registration verification email.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail());
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function isActive()
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        $roles = $this->getRoleNames()->toArray();

        if (\count($roles)) {
            return implode(
                ', ',
                array_map(
                    fn ($item) => ucwords($item),
                    $roles
                )
            );
        }

        return 'N/A';
    }

    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return  bool
     */
    public function canImpersonate(): bool
    {
        return $this->can('impersonate-users');
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return  bool
     */
    public function canBeImpersonated(): bool
    {
        return !$this->isSuperAdmin();
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->id === 1;
    }

    /**
     * Get User Courses
     */
    public function courses()
    {
        return $this->hasMany(UserCourse::class);
    }
}
