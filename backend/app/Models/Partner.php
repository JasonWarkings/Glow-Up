<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
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