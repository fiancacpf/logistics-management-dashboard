<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'action', 'action_id', 'ip_address', 'user_agent', 'country', 'city'
    ];

    protected static $actionMap = [
        'iniciou sessão' => 'login',
        'terminou sessão' => 'logout',
        'registrou entrada em stock' => 'create_stock_entry',
        'eliminou entrada em stock' => 'delete_stock_entry',
        'registrou saída em stock' => 'create_stock_output',
        'eliminou saída em stock' => 'delete_stock_output',
        'criou uma campanha' => 'create_campaign',
        'adicionou um armazém' => 'add_warehouse',
        'confirmou a chegada da mercadoria no armazém' => 'validate_stock_entry_arrival',
        'eliminou inventário' => 'delete_stock_inventory',
        'criou um inventário' => 'create_stock_inventory',
        'executou contagem do inventário' => 'review_stock_inventory',
        'rejeitou contagem do inventário' => 'reject_stock_inventory',
        'revisou e aprovou inventário' => 'complete_stock_inventory',
    ];

    public function getFormattedIdAttribute() {
        return 'USER' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getAccessLogActionLabelAttribute()
    {
        return match ($this->action) {
            'login' => 'Iniciou sessão',
            'logout' => 'Terminou sessão',
            'create_stock_entry' => 'Registrou entrada em stock',
            'delete_stock_entry' => 'Eliminou entrada em stock',
            'create_stock_output' => 'Registrou saída em stock',
            'delete_stock_output' => 'Eliminou saída em stock',
            'create_campaign' => 'Criou uma campanha',
            'add_warehouse' => 'Adicionou um armazém',
            'validate_stock_entry_arrival' => 'Confirmou a Chegada da Mercadoria no Armazém',
            'delete_stock_inventory' => 'Eliminou Inventário',
            'create_stock_inventory' => 'Criou um Inventário',
            'review_stock_inventory' => 'Executou Contagem do Inventário',
            'reject_stock_inventory' => 'Rejeitou Contagem do Inventário',
            'complete_stock_inventory' => 'Revisou e Aprovou Inventário',
            default => $this->action,
        };
    }

    public static function getActionMap()
    {
        return self::$actionMap;
    }
}
