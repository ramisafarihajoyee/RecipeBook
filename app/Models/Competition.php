<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CompositeKeyModelHelper;

class Competition extends Model
{
    // use HasFactory;
    public $table = 'competitions';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
