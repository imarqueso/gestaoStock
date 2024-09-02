@extends('layouts.basico')

@section('titulo', 'Dashboard | Gestão Stock')
@section('pagina', 'Dashboard')

@section('conteudo')

<style>
    .dashboard-container {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .dashboard-content {
        width: 100%;
        max-width: 1220px;
        max-width: ;
        height: auto;
        padding: 60px 20px 80px 20px;
        display: grid;
        grid-template-columns: repeat(2, 48%);
        grid-auto-rows: auto;
        justify-content: center;
        align-items: flex-start;
        column-gap: 4%;
    }

    .dashboard-box {
        width: 100%;
        height: 100%;
        padding: 35px 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        background-color: var(--secondary);
        overflow: auto;
        border-radius: 8px;
    }

    /* width */
    .dashboard-box::-webkit-scrollbar {
    height: 12px;
    }

    /* Track */
    .dashboard-box::-webkit-scrollbar-track {
    background: var(--light);
    }

    /* Handle */
    .dashboard-box::-webkit-scrollbar-thumb {
    background: var(--primary);
    }

    .dashboard-box h3 {
        font-size: 18px;
        line-height: 24px;
        color: var(--primary);
        font-weight: 600;
        text-align: left;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        min-width: 680px;
        height: auto;
        background-color: transparent;
        border-collapse: separate !important;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        border-spacing: 0;  
    }

   th {
        border: 1px solid #6c88d7;
        border-bottom: 1px solid #6c88d7 !important;
        padding: 12px 30px 12px 10px !important;
        background-color: rgb(94 120 195);
        font-size: 16px;
        text-transform: uppercase;
        color: var(--light);
        line-height: 18px;
        text-align: left;
        white-space: nowrap;
   }

   td {
        border: 1px solid #eeeaea;
        padding: 15px;
        background-color: var(--light);
        font-size: 18px;
        text-transform: uppercase;
        color: var(--primary);
        line-height: 20px;
        text-align: left;
        white-space: nowrap;
   }

   @media (max-width: 1080px) {
        .dashboard-content {
            width: 100%;
            max-width: 1170px;
            height: auto;
            padding: 60px 20px;
            display: grid;
            grid-template-columns: repeat(1, 100%);
            grid-auto-rows: auto;
            justify-content: center;
            align-items: flex-start;
            row-gap: 30px;
        }

        .dashboard-box h3 {
            font-size: 16px;
            line-height: 22px;
        }
   }

   .produtos-td-1, .vendas-td-2 {
        min-width: 180px;
   }

   .produtos-td-2, .vendas-td-3 {
        min-width: 165px;
   }

   .vendas-td-4 {
        min-width: 120px;
   }

   .produtos-td-4, .vendas-td-5 {
        min-width: 130px;
   }

   .vendas-td-6 {
    min-width: 150px;
   }

   .nobreak {
        white-space: nowrap !important;
    }
</style>

<section class="dashboard-container">
    <div class="dashboard-content">
        <div class="dashboard-box">
            <h3>Últimos produtos adicionados</h3>
            <table>
                <tr>
                    <th>SKU</th>
                    <th>Produto</th>
                    <th>Grupo</th>
                    <th>Preço</th>
                    <th>Cadastro</th>
                </tr>
                @if(isset($produtos))
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="produtos-td-0">{{$produto->sku}}</td>
                        <td class="produtos-td-1">{{$produto->produto}}</td>
                        <td class="produtos-td-1">{{$produto->grupo->grupo}}</td>
                        <td class="produtos-td-2 nobreak"><span class="dinheiro">{{$produto->preco}}</span></td>
                        <td class="produtos-td-4">{{\Carbon\Carbon::parse($produto->created_at)->format('d/m/Y')}}</td>
                    </tr>
                @endforeach
                @endif
            </table>
        </div>
        <div class="dashboard-box">
            <h3>Últimos produtos vendidos</h3>
            <table>
                <tr>
                    <th>SKU</th>
                    <th>Produto</th>
                    <th>Grupo</th>
                    <th>Preço</th>
                    <th>Data da Venda</th>
                </tr>
                @if(isset($vendas))
                @foreach ($vendas as $venda)
                    <tr>
                        <td class="vendas-td-1">{{$venda->sku}}</td>
                        <td class="vendas-td-2">{{$venda->produto->produto}}</td>
                        <td class="vendas-td-2">{{$venda->produto->grupo->grupo}}</td>
                        <td class="vendas-td-3"><span class="dinheiro">{{$venda->preco}}</span></td>
                        <td class="vendas-td-5">{{\Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y')}}</td>
                    </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        // Aplica a máscara de moeda ao campo de entrada
        $('.dinheiro').mask('#.##0,00', {reverse: true});

        $('.dinheiro').each(function() {
            let valorDinheiro = $(this).text().trim();
        
            // Se o valor começa com um ponto, remova-o
            if (valorDinheiro.startsWith('.')) {
                valorDinheiro = valorDinheiro.replace(/^\./, '');
            }
        
            // Atualiza o span com o valor sem o ponto no início
            $(this).text(valorDinheiro);
        });       
    });
</script>

@endsection
