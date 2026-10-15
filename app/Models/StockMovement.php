<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'quantity',
        'unit_id',
        'movement_type',
        'batch_id',
        'movement_date',
        'user_id',
        'type',
        'stock_output_item_id'
    ];
}
