<?php

namespace App\Http\Controllers\Auth;

use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function view($grupo_id)
    {

        $produtos = Produto::select(
            'produtos.id',
            'produtos.sku',
            'produtos.produto',
            'produtos.preco',
            'produtos.grupo_id',
            'produtos.vendido',
            'produtos.vencimento',
            'produtos.vencimento_anterior',
            'produtos.created_at',
        )->join('grupos', $grupo_id, '=', 'produtos.grupo_id')->orderby('produtos.id', 'DESC')->get();;

        return view('produtos.index', compact('produtos'));
    }

    public function cadastrar(Request $request)
    {
        $produto = Produto::create([
            'sku' => $request->sku,
            'produto' => $request->produto,
            'preco' => $request->preco,
            'grupo_id' => $request->grupo_id,
            'vendido' => $request->vendido,
            'vencimento' => $request->vencimento,
        ]);

        return redirect("/produtos/$request->grupo_id")->with('msg', 'Produto cadastrado com sucesso!');
    }

    private function formatarNumero($numero)
    {
        $numero = str_replace('.', '', $numero); // Remove separador de milhar
        $numero = str_replace(',', '.', $numero); // Troca vírgula por ponto
        return floatval($numero); // Converte a string para float
    }

    public function vender(Request $request, $id)
    {
        $produto = Produto::find($id);

        $produto->update([
            'vendido' => 1,
        ]);

        $venda = Venda::create([
            'produto_id' => $id,
            'preco' => $produto->preco,
            'data_venda' => $request->data_venda,
        ]);
        return redirect("/produtos/$request->grupo_id")->with('msg', 'Produto vendido com sucesso!');
    }

    public function editar(Request $request, $id)
    {
        $produto = Produto::find($id);

        if ($produto->vencimento !== $request->vencimento) {
            $vencimento_anterior = $produto->vencimento;
        }

        $produto->update([
            'sku' => $request->sku,
            'produto' => $request->produto,
            'preco' => $request->preco,
            'vencimento' => $request->vencimento,
            'vencimento_anterior' => $vencimento_anterior,
        ]);

        return redirect("/produtos/$request->grupo_id")->with('msg', 'Produto editado com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        $venda = Venda::with('produto_id')->where('produto_id', '=', $id);
        $produto = Produto::find($id);

        $venda->delete();
        $produto->delete();

        return redirect("/produtos/$request->grupo_id")->with('msg', 'Produto excluido com sucesso!');
    }
}
