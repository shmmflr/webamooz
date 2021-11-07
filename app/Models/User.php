<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create(array $data)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userRole()
    {
        if ($this->role === 'user') {
            return 'کاربر عادی';
        }
        if ($this->role === 'author') {
            return 'نویسنده';
        }
        if ($this->role === 'teacher') {
            return 'مدرس';
        }
        if ($this->role === 'admin') {
            return 'مدیر';
        }
    }

    public function jalaliDate()
    {
        $date = $this->created_at;
        return verta($date)->format('%d/%B/%Y - H:i');
    }
}
