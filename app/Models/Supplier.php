<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    //protected $table = 'tb_suppliers';

    public function getFormattedIdAttribute() {
        return 'MFF' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }
}
