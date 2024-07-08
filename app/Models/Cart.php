<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'customer_id',
        'product_id',
        'pty',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

     // Phương thức để tính tổng số lượng sản phẩm đã bán
    public static function totalQuantitySold()
    {
        return self::sum('pty');
    }

    // Phương thức để tính tổng tiền của tất cả đơn hàng
    public static function totalRevenue()
    {
        return self::sum('price');
    }
}
