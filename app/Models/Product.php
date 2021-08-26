<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [
        'id',
    ];

    public $sortable = [
        'id',
        'name',
        'price',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'name' => 'required',
        'price' => 'required|integer|min:0',
    ];

    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

}
