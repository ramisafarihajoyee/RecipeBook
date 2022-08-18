<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use HasFactory;
    public $table = 'users';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

}
