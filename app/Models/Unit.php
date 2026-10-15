<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function getFormattedIdAttribute() {
        return 'MFN' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
