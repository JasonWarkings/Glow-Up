<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'lastName',
        'email',
        'phone',
        'birthday',
        'gender',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ✅ ВОТ ЭТО ГЛАВНОЕ
    public function favoriteProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'favorites',
            'user_id',
            'product_id'
        );
    }
}