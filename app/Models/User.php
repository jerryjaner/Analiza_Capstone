<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'account_no',
        'name',
        'address',
        'cp',
        'house_block_lot',
        'street',
        'subdivision',
        'barangay',
        'municipality',
        'province',
        'landmark',
        'is_Approved',
        'image_prof',
        'role',
        'email',
        'password',
        'verification',
        'is_Online',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function personal_info(){
        return $this->hasOne(PersonalInfo::class, 'id');
    }

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class, 'user_id');
    }
}
