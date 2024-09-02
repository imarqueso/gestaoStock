<?php

namespace App\Http\Controllers\Auth;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view()
    {
        $vendas = Venda::select(
            'produtos.sku',
            'produtos.produto',
            'produtos.preco',
            'vendas.produto_id',
            'vendas.id',
            'vendas.data_venda',
        )->join('produtos', 'produtos.id', '=', 'vendas.produto_id')->limit(5)->orderBy('vendas.id', 'desc')->get();

        $produtos = Produto::select(
            'produtos.id',
            'produtos.sku',
            'produtos.produto',
            'produtos.preco',
            'produtos.created_at',
        )->limit(5)->orderBy('produtos.id', 'desc')->get();

        return view('dashboard.index', compact('vendas', 'produtos'));
    }
}
