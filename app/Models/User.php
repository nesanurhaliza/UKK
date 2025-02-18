<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'name',
        'phonenumber',
        'email',
        'as',
        'active',
        'admin_access',
        'password',
        'assessor_type'
    ];



    protected $attributes = [
        'active' => 1, // Default active adalah true (1)
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function assessor()
    {
        return $this->hasOne(Assessor::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function hasRole($as)
{
    return $this->role === $as;
}


}
