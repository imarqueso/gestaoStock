<?php

namespace App\Http\Controllers\Auth;

use App\Models\Produto;
use App\Models\Venda;
use App\Services\ListarProdutos;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function view(ListarProdutos $listarProdutos)
    {
        $listaProd = $listarProdutos->listarProdutos();

        $vendas = Venda::select(
            'id',
            'produto_id',
            'data_venda',
        )->orderby('id', 'DESC')->get();

        return view('vendas.index', compact('listaProd', 'vendas'));
    }

    private function formatarNumero($numero)
    {
        $numero = str_replace('.', '', $numero); // Remove separador de milhar
        $numero = str_replace(',', '.', $numero); // Troca vírgula por ponto
        return floatval($numero); // Converte a string para float
    }

    public function excluir(Request $request, $id)
    {
        $venda = Venda::find($id);
        $produto = Produto::find($request->produto_id);

        $produto->update([
            'vendido' => 0,
        ]);

        $venda->delete();

        return redirect('/vendas')->with('msg', 'Venda excluida com sucesso!');
    }
}
