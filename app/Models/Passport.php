<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'nationalty',
        'expiry_date',
        'birth_date',
        'user_id'
    ];

}
