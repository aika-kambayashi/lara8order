<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public static $rules = [
        'order_id' => 'required|exists:orders,id',
        'product_id' => 'required|exists:products,id',
        'unit' => 'required|integer|min:1',
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
