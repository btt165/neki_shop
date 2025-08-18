<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'brand_id'];
    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function products() {
        return $this->hasMany(Product::class, 'productLine_id', 'id');
    }
}
