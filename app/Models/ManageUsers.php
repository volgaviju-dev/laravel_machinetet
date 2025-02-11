<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageUsers extends Model
{
    use HasFactory;
    protected $table = 'manage_users';
    protected $fillable = [

        'name', 'email','phone_number'

    ];

}
