@extends('layouts.basico')

@section('titulo', 'Vendas | Gestão Stock')
@section('pagina', 'Vendas por Produto')

@section('conteudo')
<style>
    .vendas-container {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .vendas-content {
        width: 100%;
        max-width: 1220px;
        height: auto;
        padding: 60px 20px 80px 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .vendas-box {
        max-height: 722px;
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
    .vendas-box::-webkit-scrollbar {
    height: 12px;
    }

    /* Track */
    .vendas-box::-webkit-scrollbar-track {
    background: var(--light);
    }

    /* Handle */
    .vendas-box::-webkit-scrollbar-thumb {
    background: var(--primary);
    }

    .vendas-box h3 {
        font-size: 18px;
        line-height: 24px;
        color: var(--primary);
        font-weight: 600;
        text-align: left;
        margin-bottom: 20px;
    }

    .vendas-box input, .vendas-box select {
        background-color: white;
        height: 30px;
        border: 0px;
        border-radius: 5px;
    }

    #dataTable_filter {
        margin-bottom: 30px !important;
    }

    .vendas-box label {
        color: var(--primary);
        font-size: 14px !important;
    }

    .vendas-box label input {
        margin-left: 10px !important;
        padding: 0px 15px 0px 15px;
    }

    .vendas-box label select {
        margin-right: 10px !important;
    }

    table {
        width: 100%;
        min-width: 1135px !important;
        height: auto;
        background-color: transparent;
        border-collapse: collapse !important;
        border: none;
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

    td button {
        width: 30px;
        min-width: 30px;
        max-width: 30px;
        height: 30px;
        min-height: 30px;
        max-height: 30px;
        border-radius: 50%;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    td .excluir {
        width: 30px;
        min-width: 30px;
        max-width: 30px;
        height: 30px;
        min-height: 30px;
        max-height: 30px;
        border-radius: 50%;
        border: none;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background-color: #8d3a3a;
    }

    .td-excluir {
        position: relative;
        width: auto;
        height: auto;
        padding: 0px;
    }

    td button.vender {
        background-color: #16b65e;
    }

    td button.editar {
        background-color: #09308b;
    }

    td button:hover {
        filter: brightness(1.5);
        transition: 0.5s ease all;
    }

    td button img {
        height: 10px;
        width: auto;
    }

    td .excluir img {
        height: 10px;
        width: auto;
    }

    .td-excluir form {
        position: absolute;
        top: -30px;
        right: 20px;
        width: auto;
        height: auto;
        justify-content: flex-start;
        align-items: center;
        border-radius: 6px;
        z-index: 9000;
        display: none;
        visibility: hidden;
        opacity: 0;
        transition: 0.5s ease all;
    }

    .td-excluir form .btn-excluir {
        width: auto !important;
        min-width: auto !important;
        max-width: none !important;
        height: auto !important;
        min-height: auto !important;
        max-height: none !important;
        padding: 5px 15px;
        border-radius: 5px;
        background-color: var(--primary);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 11px;
        line-height: 17px;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
        margin-right: 5px;
        transition: 0.5s ease all;
    }

    .td-excluir form .btn-cancelar {
        width: auto;
        padding: 5px 15px;
        border-radius: 5px;
        background-color: #993b3b;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 11px;
        line-height: 17px;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.5s ease all;
    }

    .td-excluir form .btn-excluir:hover, .td-excluir form .btn-cancelar:hover {
        filter: brightness(1.5);
        transition: 0.5s ease all;
    }

    .abrir-excluir {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
        transition: 0.5s ease all;
    }

    .dataTables_paginate {
        width: auto !important;
        height: auto !important;
        margin-top: 10px !important;
    }

    .dataTables_paginate a {
        width: auto !important;
        height: auto !important;
        padding: 8px 12px !important;
        border-radius: 3px !important;
        background-color: var(--primary);
        color: white;
        font-size: 12px !important;
        line-height: 18px;
        font-weight: 600;
        margin: 20px 0px 0px 5px;
        text-transform: uppercase;
        transition: 0.5s ease all;
        cursor: pointer;
    }

    .dataTables_paginate a:hover {
        filter: brightness(3);
        transition: 0.5s ease all;
    }

    .dataTables_paginate .disabled {
        filter: grayscale(1);
        cursor: default;
    }

    .dataTables_paginate .disabled:hover {
        filter: grayscale(1);
    }

    .modal-cadastrar label {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .modal-cadastrar label span {
        font-size: 14px;
        line-height: 20px;
        color: #363636;
        font-weight: 400;
        margin-bottom: 6px;
    }

    .modal-cadastrar label input {
        margin-left: 0px !important;
    }

    .alert-success, .alert-danger {
        margin-top: 0px !important;
    }

    .nobreak {
        white-space: nowrap !important;
    }

    button[disabled] {
        background-color: #464444 !important;
    }
</style>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<style>
    .selectize-control {
        width: 100% !important;
        margin-bottom: 0px !important;
        padding: 8px 0px !important;
    }

    .selectize-input {
        border-radius: 8px !important;
        border: 2px solid #cac7c7ba !important;
        transition: 0.3s ease all !important;
    }

    .selectize-input .item {
        width: 100% !important;
        height: 25px !important;
        padding: 0px 8px !important;
        display: flex !important;
        justify-content: flex-start !important;
        align-items: center !important;
    }

    .selectize-input:hover {
        border: 2px solid rgba(75, 110, 209, 1) !important;
        transition: 0.3s ease all !important;
    }

    .selectize-input>input {
        width: 100% !important;
        height: 25px !important;
        padding: 0px 8px !important;
    }

    .selectize-dropdown .selected, .selectize-dropdown .active {
        background-color: rgba(75, 110, 209, 1) !important;
        color: white !important;
    }

    .selectize-dropdown {
        top: 87% !important;
    }

    .selectize-control.plugin-clear_button .clear {
        height: 56px !important;
    }

    .selectize-control.single .selectize-input:after {
        top: 21px !important;
    }
</style>

<section class="vendas-container">
    <div class="vendas-content">
        @include('partials.mensagem')
        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
        <button class="btn-principal">Cadastrar Venda</button>
        @endif
        <div class="vendas-box">
            <h3>Vendas cadastradas</h3>
            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
            <section class="modal-container modal-cadastrar">
                <div class="modal-content">
                    <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-cadastrar">
                    <h3 class="titulo-modal">Cadastrar Venda</h3>
                    <form method="post" action="{{ route('cadastrarVenda') }}" enctype="multipart/form-data">
                        @csrf
                        <select name="produto_id" required class="produto-select" id="produto-select">
                            <option value selected disabled>Selecione o produto</option>
                            @foreach ($listaProd as $prod)
                            <option value="{{ $prod->id }}">{{ $prod->produto }}</option>
                            @endforeach
                        </select>
                        <label>
                            <span>Data da Venda*:</span>
                            <input type="date" required name="data_venda" placeholder="Data da Venda*:" class="save_required">
                        </label>
                        <input type="number" name="vendidos" value="" placeholder="Vendidos*" required class="save_required">
                        <button class="salvar btnSave" type="submit">Salvar</button>
                    </form>
                </div>
            </section>
            @endif
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Data da Venda</th>
                        <th>Vendido</th>
                        <th>Total</th>
                        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                        <th>Excluir</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $venda)
                        <tr>
                            <td>{{$venda->id}}</td>
                            <td>{{$venda->produto}}</td>
                            <td class="nobreak">R$ <span class="dinheiro">{{$venda->preco}}</span></td>
                            <td>{{$venda->quantidade}}</td>
                            <td>{{\Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y')}}</td>
                            <td>{{$venda->vendidos}}</td>
                            <td class="nobreak">R$ <span class="dinheiro">{{$venda->total}}</span></td>
                            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                            <td>
                                <div class="td-excluir">
                                    <span class="excluir">
                                        <img src="{{ asset('assets/img/icones/excluir.svg') }}">
                                    </span>
                                    <form method="post"
                                    action="/vendas/{{$venda->id}}/excluir"
                                    enctype="multipart/form-data" class="modal-excluir">
                                        @csrf
                                        <input type="number" name="quantidade" value="{{$venda->quantidade}}" hidden>
                                        <input type="number" name="vendidos" value="{{$venda->vendidos}}" hidden>
                                        <input type="number" name="produto_id" value="{{$venda->produto_id}}" hidden>
                                        <button type="submit" class="btn-excluir salvar">Excluir</button>
                                        <span class="btn-cancelar">Cancelar</span>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

<script>
    $(function () {
        $(".produto-select").selectize({
          plugins: ["restore_on_backspace", "clear_button"],
          delimiter: " - ",
          persist: false,
          maxItems: 1,
        });
      });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum resultado encontrado",
                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "paging": true,
            "bSort": true,
            'pagingType': 'full',
            'order': [[0, 'desc']],
            'ordering': true,
        });
    });
</script>
@if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
<script>
    var btnCadastrar = document.querySelectorAll("button.btn-principal");
    var modalCadastrar = document.querySelectorAll("section.modal-cadastrar");

    btnCadastrar.forEach(function(item, index) {
        item.addEventListener("click", function() {
                if (modalCadastrar[index].classList.contains("abrir")) {
                    modalCadastrar[index].classList.remove("abrir");
            } else {
                for (var i = 0; i < modalCadastrar.length; i++) {
                    modalCadastrar[i].classList.remove("abrir");
                }
                modalCadastrar[index].classList.add("abrir");
            }
        });
    });

    var closeCadastrar = document.querySelectorAll("img.close-cadastrar");

    closeCadastrar.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalCadastrar[index].classList.remove("abrir");
        });
    })
</script>

<script>
    var btnExcluir = document.querySelectorAll("span.excluir");
    var btnCancelar = document.querySelectorAll("span.btn-cancelar");
    var modalExcluir = document.querySelectorAll("form.modal-excluir");

    btnExcluir.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalExcluir[index].classList.toggle('abrir-excluir');
        });
    });

    btnCancelar.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalExcluir[index].classList.remove('abrir-excluir');
        });
    });
</script>
@endif

<script>
    $(document).ready(function(){
        // Aplica a máscara de moeda ao campo de entrada
        $('.preco').mask('#.##0,00', {reverse: true});
        $('.dinheiro').mask('#.##0,00', {reverse: true});
    });

    $('.preco').each(function() {
        let valorPreco = $(this).val();
    
        // Se o valor começa com um ponto, remova-o
        if (valorPreco.startsWith('.')) {
            valorPreco = valorPreco.replace(/^\./, '');
        }
    
        // Atualiza o campo com o valor sem o ponto no início
        $(this).val(valorPreco);
    });

    $('.dinheiro').each(function() {
        let valorDinheiro = $(this).text().trim();
    
        // Se o valor começa com um ponto, remova-o
        if (valorDinheiro.startsWith('.')) {
            valorDinheiro = valorDinheiro.replace(/^\./, '');
        }
    
        // Atualiza o span com o valor sem o ponto no início
        $(this).text(valorDinheiro);
    });     
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButtonAdd = document.querySelector('.btnSave');
        saveButtonAdd.classList.add('disabled');
        saveButtonAdd.setAttribute('disabled', 'disabled');
    });
    const productSelect = document.getElementById('produto-select');
    
     // Função para verificar o estado do select
     function checkProductSelect() {
        const selectedValue = productSelect.value;
        
        // Verifica se o valor do select é vazio e altera o texto do botão
        if (selectedValue === '') {
            event.preventDefault();  // Evita a ação padrão caso o select esteja vazio
            saveButtonAdd.textContent = 'Selecione o produto!';  // Altera o texto do botão
        } else {
            saveButtonAdd.textContent = 'Enviando...';  // Altera o texto do botão quando o produto é selecionado
        }
    }

    // Verifica o select sempre que houver mudança no seu valor
    saveButtonAdd.addEventListener('click', checkProductSelect);

    // Função para verificar todos os campos e controlar o estado do botão
    function checkFields() {
        const requiredFields = document.querySelectorAll('.save_required');
        const saveButton = document.querySelector('.btnSave');

        const allFilled = Array.from(requiredFields).every(field => {
            if (field.tagName === 'SELECT') {
                return field.value !== '';  // Para selects, verifica se uma opção foi selecionada
            }
            return field.value.trim() !== '';  // Para inputs de texto, verifica se não está vazio
        });

        // Controla o estado do botão salvar
        if (allFilled) {
            saveButton.classList.remove('disabled');
            saveButton.removeAttribute('disabled');
        } else {
            saveButton.classList.add('disabled');
            saveButton.setAttribute('disabled', 'disabled');
        }
    }

    // Aplica o event listener a cada campo individualmente
    document.querySelectorAll('.save_required').forEach(field => {
        // Adiciona o event listener 'input' a cada campo
        field.addEventListener('input', checkFields);
    });
</script>

@endsection
