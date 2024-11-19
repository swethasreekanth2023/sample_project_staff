<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'email',
        'password',
        'role_id',        // Updated from 'role' to 'role_id'
        'department_id',  // Added 'department_id'
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

    /**
     * Relationship with Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Explicitly set foreign key
    }

    /**
     * Relationship with Department.
     */
    public function department()
    {
        // return $this->belongsTo(Department::class, 'department_id'); // Explicitly set foreign key
        return $this->belongsTo(Department::class);
    }
    
}
