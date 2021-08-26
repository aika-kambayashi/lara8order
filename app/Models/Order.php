<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [
        'id',
    ];

    public $sortable = [
        'id',
        'name',
        'customer_id',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'name' => 'required',
        'customer_id' => 'required|exists:customers,id',
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function order_details() {
        return $this->hasMany('App\Models\OrderDetail', 'order_id');
    }
}
