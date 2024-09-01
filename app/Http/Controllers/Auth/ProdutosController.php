<?php

namespace App\Http\Controllers\Auth;

use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Venda;
use Carbon\Carbon;
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
                'comentarios',
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

        // Loop para inserir múltiplos produtos com base na quantidade
        for ($i = 0; $i < $request->quantidade; $i++) {
            Produto::create([
                'sku' => $request->sku,
                'produto' => $request->produto,
                'preco' => $request->preco,
                'grupo_id' => $request->grupo_id,
                'vendido' => $request->vendido,
                'validade' => $validade,
                'validade_anterior' => null,
                'comentarios' => $request->comentarios,
            ]);
        }
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

        $validade = $request->has('validade') ? Carbon::parse($request->validade)->toDateString() : null;

        // Verifica se a validade foi alterada
        if ($produto->validade !== $validade) {
            $validade_anterior = $produto->validade;
        } else {
            $validade_anterior = $produto->validade_anterior; // Mantém a validade anterior se não foi alterada
        }

        $produto->update([
            'sku' => $request->sku,
            'produto' => $request->produto,
            'preco' => $request->preco,
            'validade' => $request->validade,
            'validade_anterior' => $validade_anterior,
            'comentarios' => $request->comentarios,
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
