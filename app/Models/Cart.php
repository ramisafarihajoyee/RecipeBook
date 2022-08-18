<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
       // use HasFactory;
       public $table = 'shoppinglists';
       public $primaryKey = 'id';
       public $incrementing = false;
       public $timestamps = false;

}
