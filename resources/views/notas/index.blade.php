@extends('layouts.basico')

@section('titulo', 'Notas | Gestão Stock')
@section('pagina', 'Notas Geradas')

@section('conteudo')
<style>
    .notas-container {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .notas-content {
        width: 100%;
        max-width: 1220px;
        height: auto;
        padding: 60px 20px 80px 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .notas-box {
        max-height: 803px;
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
    .notas-box::-webkit-scrollbar {
    height: 12px;
    }

    /* Track */
    .notas-box::-webkit-scrollbar-track {
    background: var(--light);
    }

    /* Handle */
    .notas-box::-webkit-scrollbar-thumb {
    background: var(--primary);
    }

    .notas-box h3 {
        font-size: 18px;
        line-height: 24px;
        color: var(--primary);
        font-weight: 600;
        text-align: left;
        margin-bottom: 20px;
    }

    .notas-box input, .notas-box select {
        background-color: white;
        height: 30px;
        border: 0px;
        border-radius: 5px;
    }

    #dataTable_filter {
        margin-bottom: 30px !important;
    }

    .notas-box label {
        color: var(--primary);
        font-size: 14px !important;
    }

    .notas-box label input {
        margin-left: 10px !important;
        padding: 0px 15px 0px 15px;
    }

    .notas-box label select {
        margin-right: 10px !important;
    }

    table {
        width: 100%;
        min-width: 1135px !important;
        height: auto;
        background-color: transparent;
        border-collapse: separate !important;
        border: none;
        border-spacing: 0;
        border-radius: 10px; 
        overflow: hidden;
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

    td .visualizar {
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

    td .visualizar {
        background-color: #2c2c2c;
        text-decoration: none;
    }

    td button:hover {
        filter: brightness(1.5);
        transition: 0.5s ease all;
    }

    td a.visualizar:hover {
        filter: brightness(1.5);
        transition: 0.5s ease all;
    }

    td button img {
        height: 10px;
        width: auto;
    }

    td .visualizar img {
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

    .btn-itens {
        height: 30px !important;
        font-size: 12px !important;
        line-height: 18px !important;
        background-color: #159123 !important;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .modal-cadastrar hr {
        width: 100%;
        margin-bottom: 10px;
        background-color: gray;
        color: gray;
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

    .qtd-prod {
        margin-bottom: 15px !important;
        border-bottom: 1px solid var(--primary) !important;
    }

    .itens-nota {
        padding: 0px !important;
        white-space: nowrap !important;
    }

    .nobreak {
        white-space: nowrap !important;
    }

    .itens-nota-box {
        width: 100%;
        height: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .itens-nota-box .item {
        width: auto;
        height: auto;
        padding: 5px 10px;
        margin: 0px 0px 5px 0px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background-color: var(--primary);
        color: white;
        font-size: 12px;
        line-height: 18px;
        font-weight: 400;
        text-transform: none !important;
    }

    .itens-nota-box .item:last-of-type {
        margin-bottom: 0px !important;
    }

    .itens-nota-box .item .unidade {
        text-transform: none !important;
        color: white;
        font-weight: 600;
    }

    .itens-nota-box .item .total {
        text-transform: none !important;
        color: #46e446;
        font-weight: 600;
    }

    button[disabled] {
        background-color: #464444 !important;
    }
</style>

<section class="notas-container">
    <div class="notas-content">
        @include('partials.mensagem')
        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
            <button class="btn-principal">Cadastrar Nota</button>
        @endif
        <div id="alert-box" class="alert-warning" role="alert">
            <div class="alert-box">
                <span class="barra"></span>
                Ao excluir a venda, o produto voltara para o estoque caso não esteja vencido!
            </div>
        </div>
        <div class="notas-box">
            <h3>Notas cadastradas</h3>
            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
            <section class="modal-container modal-cadastrar">
                <div class="modal-content">
                    <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-cadastrar">
                    <h3 class="titulo-modal">Cadastrar Nota</h3>
                    <form method="post" action="{{ route('cadastrarNota') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="cpf" placeholder="CPF ou CNPJ" id="cpf-cnpj">
                        <input type="text" name="cliente" placeholder="Cliente*" class="save_required">
                        <input id="quantidade-item" name="qtd_itens" type="number" required min="1" placeholder="Quantidade de itens*" class="save_required">
                        <div class="box-form" id="box-form">

                        </div>
                        <label>
                            <span>Data da venda:</span>
                            <input type="date" name="data_venda" placeholder="Data da Venda*" class="save_required">
                        </label>
                        <textarea placeholder="Observações" name="observacoes"></textarea>
                        <input type="text" class="preco" name="total" placeholder="Total da Nota*" class="save_required">
                        <button class="salvar btnSave" type="submit">Salvar</button>
                    </form>
                </div>
            </section>
            @endif
            <table id="dataTable" data-role="table">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>CPF</th>
                        <th>Cliente</th>
                        <th>Produtos Vendidos</th>
                        <th>Data da Venda</th>
                        <th>Data da Nota</th>
                        <th>Total</th>
                        <th>Ver Nota</th>
                        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                        <th>Excluir</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{$nota->id}}</td>
                            <td>{{$nota->cpf}}</td>
                            <td>{{$nota->cliente}}</td>
                            <td class="itens-nota">
                                <div class="itens-nota-box">
                                    <?php $itens = json_decode($nota->itens); ?>
                                    @foreach ($itens as $item)
                                        <?php
                                            $quantidade = (float) $item->quantidade;
                                            $preco = (float) $item->preco;
                                            $total = $quantidade * $preco;
                                        ?>
                                        <span class="item">
                                            ({{ $quantidade }})&nbsp;{{ $item->produtos }}&nbsp;|&nbsp;
                                            <span><span class="unidade">{{ number_format($preco, 2, ',', '.') }}</span>/un</span>&nbsp;|&nbsp;
                                            <span>Total: <span class="total">{{ number_format($total, 2, ',', '.') }}</span></span>
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{\Carbon\Carbon::parse($nota->data_venda)->format('d/m/Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($nota->created_at)->format('d/m/Y')}}</td>
                            <td class="nobreak"><span class="dinheiro">{{$nota->total}}</span></td>
                            <td><a class="visualizar" href="/notas/{{$nota->id}}" target="_blank"><img src="{{ asset('assets/img/icones/notas.svg') }}"></a></td>
                            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                            <td>
                                <div class="td-excluir">
                                    <span class="excluir">
                                        <img src="{{ asset('assets/img/icones/excluir.svg') }}">
                                    </span>
                                    <form method="post"
                                    action="/notas/{{$nota->id}}/excluir"
                                    enctype="multipart/form-data" class="modal-excluir">
                                        @csrf
                                        <button type="submit" class="btn-excluir">Excluir</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Seleciona todos os botões com a classe 'btn-excluir'
        var excluirButtons = document.querySelectorAll('.excluir');
        var alertBox = document.getElementById('alert-box');
    
        excluirButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Previne o envio imediato do formulário
                
                if (!alertBox.classList.contains('ativo')) {
                    // Exibe o alerta com a mensagem
                    alertBox.classList.add('ativo');

                    setTimeout(() => {
                        alertBox.classList.remove('ativo');
                    }, 5000);
                } else if (alertBox.classList.contains('ativo')) {
                    return false;
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ candidatos por página",
                "zeroRecords": "Nenhum resultado encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum resultado encontrado",
                "infoFiltered": "(Filtrado from _MAX_ total de candidatos)",
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
        $('.unidade').mask('#.##0,00', {reverse: true});
        $('.dinheiro').mask('#.##0,00', {reverse: true});
        $('.total').mask('#.##0,00', {reverse: true});
        $('.preco').mask('#.##0,00', {reverse: true});

        $('.dinheiro').each(function() {
            let valorDinheiro = $(this).text().trim();
        
            // Se o valor começa com um ponto, remova-o
            if (valorDinheiro.startsWith('.')) {
                valorDinheiro = valorDinheiro.replace(/^\./, '');
            }
        
            // Atualiza o span com o valor sem o ponto no início
            $(this).text(valorDinheiro);
        });   


        $('.unidade').each(function() {
            let valorUnidade = $(this).text().trim();
        
            // Se o valor começa com um ponto, remova-o
            if (valorUnidade.startsWith('.')) {
                valorUnidade = valorUnidade.replace(/^\./, '');
            }
        
            // Atualiza o span com o valor sem o ponto no início
            $(this).text(valorUnidade);
        });   

        $('.total').each(function() {
            let valorTotal = $(this).text().trim();
        
            // Se o valor começa com um ponto, remova-o
            if (valorTotal.startsWith('.')) {
                valorTotal = valorTotal.replace(/^\./, '');
            }
        
            // Atualiza o span com o valor sem o ponto no início
            $(this).text(valorTotal);
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
    });
</script>

<script>
    const saveButtonAdd = document.querySelector('.btnSave');
    saveButtonAdd.classList.add('disabled');
    saveButtonAdd.setAttribute('disabled', 'disabled');

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

    // Função para adicionar event listeners aos novos campos dinâmicos
    function addEventListenersToFields() {
        saveButtonAdd.classList.add('disabled');
        document.querySelectorAll('.save_required').forEach(field => {
            // Remove event listeners antigos para evitar duplicações
            field.removeEventListener('input', checkFields);
            // Adiciona o event listener 'input' a cada campo
            field.addEventListener('input', checkFields);
        });
    }

    // Inicialmente chama a função para adicionar os event listeners
    addEventListenersToFields();

    // Reaplica os event listeners toda vez que novos campos são adicionados
    $('#quantidade-item').keyup(() => {
        // Código de criação dos novos inputs (código que você enviou anteriormente)
        var quantidade_itens = $('#quantidade-item').val();
        var element_itens = document.getElementById('box-form');
        
        // Limpa o conteúdo anterior antes de adicionar novos inputs
        element_itens.innerHTML = '';

        for (let i = 0; i < quantidade_itens; i++) {
            var x = document.createElement("input");
            x.setAttribute("value", "");
            x.setAttribute("type", "text");
            x.setAttribute("name", "produto[]");
            x.setAttribute("placeholder", "Nome do produto* " + (i + 1));
            x.setAttribute("required", "");
            x.setAttribute("class", "save_required");

            var y = document.createElement("input");
            y.setAttribute("value", "");
            y.setAttribute("type", "number");
            y.setAttribute("name", "quantidade[]");
            y.setAttribute("placeholder", "Quantidade do produto* " + (i + 1));
            y.setAttribute("required", "");
            y.setAttribute("class", "save_required");

            var z = document.createElement("input");
            z.setAttribute("value", "");
            z.setAttribute("type", "text");
            z.setAttribute("name", "preco[]");
            z.setAttribute("placeholder", "Preço do produto* " + (i + 1));
            z.setAttribute("required", "");
            z.setAttribute("class", "save_required preco");

            // Adiciona os elementos ao DOM
            element_itens.appendChild(x);
            element_itens.appendChild(y);
            element_itens.appendChild(z);

            // Aplica a máscara no campo de preço
            $('.preco').mask('#.##0,00', {reverse: true});
        }

        // Se a quantidade for 0, limpa os inputs
        if (quantidade_itens == 0) {
            element_itens.innerHTML = '';
        }

        // Reaplica os event listeners após a criação dos novos campos
        addEventListenersToFields();
    });

    // Executa a verificação dos campos na carga inicial da página
    checkFields();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cpfCnpjField = document.getElementById('cpf-cnpj');

        function formatCPF(value) {
            return value
                .replace(/\D/g, '') // Remove todos os caracteres não numéricos
                .replace(/(\d{3})(\d)/, '$1.$2') // Adiciona ponto entre os primeiros 3 e os seguintes 3
                .replace(/\.(\d{3})(\d)/, '.$1.$2') // Adiciona ponto entre os seguintes 3 e os seguintes 3
                .replace(/\.(\d{3})(\d)/, '.$1-$2') // Adiciona o hífen antes dos dois últimos dígitos
                .replace(/(-\d{2})\d+?$/, '$1'); // Limita os últimos dois dígitos
        }

        function formatCNPJ(value) {
            return value
                .replace(/\D/g, '') // Remove todos os caracteres não numéricos
                .replace(/(\d{2})(\d)/, '$1.$2') // Adiciona ponto entre os primeiros 2 e os seguintes 3
                .replace(/\.(\d{3})(\d)/, '.$1.$2') // Adiciona ponto entre os seguintes 3 e os seguintes 4
                .replace(/\.(\d{3})(\d)/, '.$1/$2') // Adiciona barra entre os seguintes 4 e os seguintes 4
                .replace(/(\/\d{4})(\d)/, '$1-$2') // Adiciona hífen antes dos dois últimos dígitos
                .replace(/(-\d{2})\d+?$/, '$1'); // Limita os últimos dois dígitos
        }

        function applyMask() {
            let value = cpfCnpjField.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            if (value.length <= 11) {
                cpfCnpjField.value = formatCPF(value);
            } else {
                cpfCnpjField.value = formatCNPJ(value);
            }
        }

        cpfCnpjField.addEventListener('input', applyMask);
    });
</script>
@endsection
