<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";
    protected $fillable = ['sku', 'produto', 'grupo_id', 'preco', 'vendido', 'validade', 'validade_anterior', 'comentarios'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'produto_id', 'id');
    }
}
