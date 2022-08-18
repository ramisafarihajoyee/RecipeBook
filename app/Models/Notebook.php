<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    // use HasFactory;
    public $table = 'notebooks';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
