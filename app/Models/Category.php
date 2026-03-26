<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Columns that can be filled via create() or update()
    protected $fillable = ['name', 'slug'];

    // A category can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
