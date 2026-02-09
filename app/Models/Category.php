<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'parent_id', 'is_active', 'is_delete'
    ];
    
    // Quan hệ để lấy tên danh mục cha
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ lấy danh mục con (dùng để check vòng lặp nếu cần sâu xa hơn)
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}