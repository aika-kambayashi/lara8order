<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
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
    ];

    public function orders() {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
