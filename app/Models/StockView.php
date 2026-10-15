<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockView extends Model
{
    use HasFactory;

    public function getFormattedIdAttribute() {
        return 'MSV' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
