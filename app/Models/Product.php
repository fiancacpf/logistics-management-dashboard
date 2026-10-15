<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $table = 'tb_products';

    protected $fillable = [
        'name'
    ];

    public function getFormattedIdAttribute() {
        return 'MFP' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function product_state() {
        return $this->belongsTo(ProductState::class, 'state_id');
    }
}
