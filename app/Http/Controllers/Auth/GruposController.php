<?php

namespace App\Http\Controllers\Auth;

use App\Models\Grupo;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function view()
    {

        $grupos = Grupo::select(
            'grupos.id',
            'grupos.grupo',
            'grupos.curva',
            'grupos.estoque_max',
            'grupos.estoque_min',
            'grupos.comentarios',
            'grupos.created_at',
        )->get();

        // Para cada grupo, contar os produtos filhos
        foreach ($grupos as $grupo) {
            // Obtendo os produtos filhos de cada grupo
            $estoque = Produto::where('grupo_id', $grupo->id)
                ->where(function ($query) {
                    $query->where('validade', '>', now())
                        ->orWhereNull('validade');
                })
                ->where('vendido', 0) // Condição para somar apenas os não vendidos
                ->get();

            $vendido = Produto::where('grupo_id', $grupo->id)
                ->where('vendido', 1) // Condição para somar apenas os não vendidos
                ->get();

            // Calculando o total de preços dos produtos vendidos
            $precoVendidoTotal = 0;
            foreach ($vendido as $produto) {
                // Formata o preço de cada produto vendido
                $produto->preco_formatado = $this->formatarNumero($produto->preco);
                // Soma o preço (sem formatar) para o cálculo do total
                $precoVendidoTotal += $produto->preco_formatado;
            }

            // Contando a quantidade de produtos filhos
            $grupo->estoque = $estoque->count();
            $grupo->vendido = $vendido->count();
            $grupo->faturamento = number_format($precoVendidoTotal, 2, ',', '.');
        }

        return view('grupos.index', compact('grupos'));
    }

    private function formatarNumero($numero)
    {
        $numero = str_replace('.', '', $numero); // Remove separador de milhar
        $numero = str_replace(',', '.', $numero); // Troca vírgula por ponto
        return floatval($numero); // Converte a string para float
    }

    public function cadastrar(Request $request)
    {
        $grupo = Grupo::create([
            'grupo' => $request->grupo,
            'curva' => $request->curva,
            'estoque_max' => $request->estoque_max ?? 9999999,
            'estoque_min' => $request->estoque_min ?? 1,
            'comentarios' => $request->comentarios,
        ]);

        return redirect("/grupos")->with('msg', 'Grupo cadastrado com sucesso!');
    }

    public function editar(Request $request, $id)
    {
        $grupo = Grupo::find($id);

        $grupo->update([
            'grupo' => $request->grupo,
            'curva' => $request->curva,
            'estoque_max' => $request->estoque_max ?? 9999999,
            'estoque_min' => $request->estoque_min ?? 1,
            'comentarios' => $request->comentarios,
        ]);

        return redirect('/grupos')->with('msg', 'Grupo editado com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        $venda = Venda::with('produto_id')->where('produto_id', '=', $id);
        $produto = Produto::find($id);

        $venda->delete();
        $produto->delete();

        return redirect('/grupos')->with('msg', 'Grupo excluido com sucesso!');
    }
}
