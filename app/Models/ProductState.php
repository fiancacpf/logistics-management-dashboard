<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductState extends Model
{
    use HasFactory;

    public function getTranslatedNameAttribute() {
        return match ($this->name) {
            'new' => 'New',
            'used' => 'Used',
            'damaged' => 'Damaged',
            default => $this->name,
        };
    }

}
