<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    
    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'password',
        'email_verified_at',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllUser()
    {
        return self::select('id', 'name', 'email', 'contact_number')->get();
    }

    public function otps()
    {
        return $this->hasMany(Otp::class, 'user_id');
    }

    public function scannedBy()
    {
        return $this->hasMany(ParticipantClockIn::class, 'scanned_by');
    }
}
