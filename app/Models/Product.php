<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'des',
        'price',
        'product_code',
        'category_id',
        'brand_id',
        'productLine_id',
        'color_id',
        'image',
    ];

    // Danh mục sản phẩm
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Thương hiệu
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Dòng sản phẩm
    public function productLine()
    {
        return $this->belongsTo(ProductLine::class, 'productLine_id');
    }

    // Màu sắc
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    // Ảnh phụ
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Số lượng theo size
    public function quantities()
    {
        return $this->hasMany(Quantity::class);
    }

    // Size thông qua bảng trung gian Quantity
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'quantities')->withPivot('amount');
    }
}
