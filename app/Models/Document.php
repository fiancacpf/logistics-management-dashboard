<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function getFormattedIdAttribute() {
        return 'MFD' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
