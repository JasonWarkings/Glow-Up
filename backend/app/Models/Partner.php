<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'partner_requests';

    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'logo',
        'status'
    ];

    protected $hidden = ['password'];
}