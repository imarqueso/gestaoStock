<?php

namespace App\Services;

use App\Models\Produto;

class ListarProdutos
{

    public function listarProdutos()
    {
        $produtosVendidos = Produto::where('vendido', 1)
            ->select('id', 'produto', 'sku')
            ->orderBy('produto')
            ->get();

        return $produtosVendidos;
    }
}
