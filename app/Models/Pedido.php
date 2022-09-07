<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() {
        return $this->belongsToMany(Item::class, 'pedido_produtos','pedido_id','produto_id')->withPivot('id','created_at');
    }
}
