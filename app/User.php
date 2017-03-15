<?php

namespace App;

use Kodeine\Acl\Traits\HasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Illuminate\Notifications\Notifiable;
// use App\Notifications\RegistrationNotice;
use App\Notifications\PasswordResetNotice;
class User extends Authenticatable
{
    use Notifiable, CanResetPassword, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'phone', 'optcode', 'status', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getBranch()
    {
        return $this->belongsTo('\App\Branch', 'branch_id', 'id');
    }
    public function getDept()
    {
        return $this->belongsTo('\App\Department', 'dept_id', 'id');
    }
    public function getUnit()
    {
        return $this->belongsTo('\App\Unit', 'unit_id', 'id');
    }

    public function getLogs()
    {
        return $this->hasMany('\App\ActivityLog', 'user_id', 'id');
    }
}
