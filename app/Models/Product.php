<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu khác với tên mặc định
    protected $table = 'products';

    // Tùy chọn nếu bảng không sử dụng timestamps
    public $timestamps = true;

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'ten_san_pham',
        'hinh_anh',
        'gia',
        'mo_ta',
        'trang_thai',
        'danh_muc_id'
    ];

    // Định nghĩa mối quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'danh_muc_id');
    }
    public function scopeWithCategoryName($query)
    {
        return $query->join('categories', 'products.category_id', '=', 'categories.id')
                     ->select('products.*', 'categories.name as category_name');
    }
}
