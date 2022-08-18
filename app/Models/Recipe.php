<?php

namespace App\Models;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $table = 'recipes';
    public $primaryKey = 'id';
    //public $foreignKey = 'blog_username';
    public $incrementing = true;
    public $timestamps = false;

    public function scopeSearch($query, $term){
        $columns = ['blog_username', 'title', 'ingredients', 'category', 'description'];
        foreach ($columns as $column) {
            $query->orWhere( $column, 'like', "%{$term}%");
        }
        // dd($query);
        return $query;
    }
}

