<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'sku', 'price', 'sale_price', 
        'stock', 'description', 'image', 'is_active', 'is_delete'
    ];

    // Tạo mối quan hệ: 1 Sản phẩm thuộc về 1 Danh mục
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}