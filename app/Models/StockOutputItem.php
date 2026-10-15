<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOutputItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_output_id',
        'product_id',
        'quantity',
        'unit_id',
        'batch_id'
    ];

    public function output()
    {
        return $this->belongsTo(StockOutput::class, 'stock_output_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
