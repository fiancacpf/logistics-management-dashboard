<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_inventory_id',
        'product_id',
        'batch_id',
        'expected_quantity',
        'counted_quantity',
        'difference',
        'notes',
        'counted_by',
    ];

    public function inventory() {
        return $this->belongsTo(StockInventory::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function batch() {
        return $this->belongsTo(Batch::class);
    }

}
