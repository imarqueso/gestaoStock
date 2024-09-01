<?php

namespace App\Http\Controllers\Auth;

use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function view($grupo_id)
    {

        $produtos = Produto::where('grupo_id', $grupo_id)
            ->select(
                'id',
                'sku',
                'produto',
                'preco',
                'grupo_id',
                'vendido',
                'validade',
                'validade_anterior',
                'created_at'
            )
            ->orderBy('id', 'DESC')
            ->get();

        $grupo = Grupo::findOrFail($grupo_id);

        return view('produtos.index', compact('produtos', 'grupo'));
    }

    public function cadastrar(Request $request)
    {

        $validade = $request->has('validade') ? $request->validade : null;

        $produto = Produto::create([
            'sku' => $request->sku,
            'produto' => $request->produto,
            'preco' => $request->preco,
            'grupo_id' => $request->grupo_id,
            'vendido' => $request->vendido,
            'validade' => $validade,
            'validade_anterior' => null,
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

        $validade = $request->has('validade') ? $request->validade : null;

        if ($produto->validade !== $validade) {
            $validade_anterior = $produto->validade;
        }

        $produto->update([
            'sku' => $request->sku,
            'produto' => $request->produto,
            'preco' => $request->preco,
            'validade' => $request->validade,
            'validade_anterior' => $validade_anterior,
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
