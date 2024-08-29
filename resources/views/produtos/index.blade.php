@extends('layouts.basico')

@section('titulo', 'Produtos | Gestão Stock')
@section('pagina', 'Produtos em Estoque')

@section('conteudo')
<style>
    .produtos-container {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .produtos-content {
        width: 100%;
        max-width: 1170px;
        height: auto;
        padding: 60px 20px 80px 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .produtos-box {
        width: 100%;
        height: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        background-color: var(--secondary);
        overflow: auto;
    }

    /* width */
    .produtos-box::-webkit-scrollbar {
    height: 12px;
    }

    /* Track */
    .produtos-box::-webkit-scrollbar-track {
    background: var(--light);
    }

    /* Handle */
    .produtos-box::-webkit-scrollbar-thumb {
    background: var(--primary);
    }

    .produtos-box h3 {
        font-size: 18px;
        line-height: 24px;
        color: var(--primary);
        font-weight: 600;
        text-align: left;
        margin-bottom: 20px;
    }

    .produtos-box input, .produtos-box select {
        background-color: white;
        height: 30px;
        border: 0px;
        border-radius: 5px;
    }

    #dataTable_filter {
        margin-bottom: 30px !important;
    }

    .produtos-box label {
        color: var(--primary);
        font-size: 14px !important;
    }

    .produtos-box label input {
        margin-left: 10px !important;
        padding: 0px 15px 0px 15px;
    }

    .produtos-box label select {
        margin-right: 10px !important;
    }

    table {
        width: 100%;
        min-width: 1090px !important;
        height: auto;
        background-color: transparent;
        border-collapse: collapse !important;
        border: none;
    }

    th {
        border: 1px solid #b9b8b8;
        border-bottom: 1px solid #b9b8b8 !important;
        padding: 15px;
        background-color: #d6d6d6;
        font-size: 12px;
        text-transform: uppercase;
        color: var(--primary);
        line-height: 18px;
        text-align: left;
    }

    td {
        border: 1px solid #b9b8b8;
        padding: 15px;
        background-color: var(--light);
        font-size: 14px;
        text-transform: uppercase;
        color: var(--primary);
        line-height: 20px;
        text-align: left;
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

    .modal-container label {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .modal-container label span {
        font-size: 14px;
        line-height: 20px;
        color: #363636;
        font-weight: 400;
        margin-bottom: 6px;
    }

    .modal-container label input {
        margin-left: 0px !important;
    }

    .alert-success, .alert-danger {
        margin-top: 0px !important;
    }

    .nobreak {
        white-space: nowrap !important;
    }
</style>

<section class="produtos-container">
    <div class="produtos-content">
        @include('partials.mensagem')
        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
        <button class="btn-principal">Cadastrar Produto</button>
        @endif
        <div class="produtos-box">
            <h3>Produtos cadastrados</h3>
            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
            <section class="modal-container modal-cadastrar">
                <div class="modal-content">
                    <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-cadastrar">
                    <h3 class="titulo-modal">Cadastrar Produto</h3>
                    <form method="post" action="{{ route('cadastrarProduto') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="produto" placeholder="Produto:" required class="save_required">
                        <input type="text" name="preco" placeholder="Preço:" class="preco" required class="save_required">
                        <input type="number" name="quantidade" placeholder="Quantidade:" required class="save_required">
                        <input type="number" name="vendidos" placeholder="Vendidos:" required class="save_required">
                        <button class="salvar btnSave" type="submit">Salvar</button>
                    </form>
                </div>
            </section>
            @endif
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Cadastro</th>
                        <th>Vendidos</th>
                        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                        <th>Vender</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->produto}}</td>
                            <td class="nobreak">R$ <span class="dinheiro">{{$produto->preco}}</span></td>
                            <td>{{$produto->quantidade}}</td>
                            <td>{{\Carbon\Carbon::parse($produto->data_cadastro)->format('d/m/Y')}}</td>
                            <td>{{$produto->vendidos}}</td>
                            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                            <td><button class="vender"><img src="{{ asset('assets/img/icones/vendas.svg') }}"></button></td>
                            <td><button class="editar"><img src="{{ asset('assets/img/icones/editar.svg') }}"></button></td>
                            <td>
                                <div class="td-excluir">
                                    <span class="excluir">
                                        <img src="{{ asset('assets/img/icones/excluir.svg') }}">
                                    </span>
                                    <form method="post"
                                    action="/produtos/{{$produto->id}}/excluir"
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

@if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
@foreach ($produtos as $produto)
    <section class="modal-container modal-vender">
        <div class="modal-content">
            <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-vender">
            <h3 class="titulo-modal">Vender Produto</h3>
            <form method="post" action="/produtos/{{$produto->id}}/vender" enctype="multipart/form-data" id="form_vender_{{$produto->id}}">
                @csrf
                <input type="text" value="{{$produto->produto}}" name="produto" placeholder="Produto:" disabled required class="vender_required_{{$produto->id}}">
                <input type="text" value="{{$produto->preco}}" name="preco" placeholder="Preco:" required hidden class="preco vender_required_{{$produto->id}}">
                <label>
                    <span>Data da venda:</span>
                    <input type="date" required name="data_venda" placeholder="Data da Venda:" class="vender_required_{{$produto->id}}">
                </label>
                <input type="number" value="{{$produto->quantidade}}" name="quantidade" placeholder="Quantidade em estoque:" required hidden class="vender_required_{{$produto->id}}">
                <input type="number" name="vendidos" placeholder="Quantidade vendida:" required class="vender_required_{{$produto->id}}">
                <button class="salvar btnVender_{{$produto->id}} disabled" type="submit">Salvar</button>
            </form>
        </div>

        <script>
            // Função para verificar os campos de venda do produto específico
            function checkVenderFields_{{$produto->id}}() {
                const requiredFields = document.querySelectorAll('.vender_required_{{$produto->id}}');
                const venderButton = document.querySelector('.btnVender_{{$produto->id}}');

                const allFilled = Array.from(requiredFields).every(field => {
                    return field.value.trim() !== '';  // Verifica se todos os campos estão preenchidos
                });

                // Controla o estado do botão "Salvar"
                if (allFilled) {
                    venderButton.classList.remove('disabled');
                } else {
                    venderButton.classList.add('disabled');
                }
            }

            // Aplica o event listener a cada campo individualmente
            document.querySelectorAll('.vender_required_{{$produto->id}}').forEach(field => {
                field.addEventListener('input', checkVenderFields_{{$produto->id}});
            });

            // Inicializa o botão com a classe disabled
            checkVenderFields_{{$produto->id}}();
        </script>
    </section>

    <section class="modal-container modal-editar">
        <div class="modal-content">
            <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-editar">
            <h3 class="titulo-modal">Editar Produto</h3>
            <form method="post" action="/produtos/{{$produto->id}}/editar" enctype="multipart/form-data" id="form_editar_{{$produto->id}}">
                @csrf
                <label>
                    <span>Produto:</span>
                    <input type="text" value="{{$produto->produto}}" name="produto" placeholder="Produto:" required class="editar_required_{{$produto->id}}">
                </label>
                <label>
                    <span>Preço:</span>
                    <input type="text" value="{{$produto->preco}}" name="preco" placeholder="Preço:" required class="preco editar_required_{{$produto->id}}">
                </label>
                <label>
                    <span>Quantidade:</span>
                    <input type="number" value="{{$produto->quantidade}}" name="quantidade" placeholder="Quantidade:" required class="editar_required_{{$produto->id}}">
                </label>
                <button class="salvar btnEdit_{{$produto->id}} disabled" type="submit">Salvar</button>
            </form>
        </div>

        <script>
            // Função para verificar os campos de edição do produto específico
            function checkEditarFields_{{$produto->id}}() {
                const requiredFields = document.querySelectorAll('.editar_required_{{$produto->id}}');
                const editButton = document.querySelector('.btnEdit_{{$produto->id}}');

                const allFilled = Array.from(requiredFields).every(field => {
                    return field.value.trim() !== '';  // Verifica se todos os campos estão preenchidos
                });

                // Controla o estado do botão "Salvar"
                if (allFilled) {
                    editButton.classList.remove('disabled');
                } else {
                    editButton.classList.add('disabled');
                }
            }

            // Aplica o event listener a cada campo individualmente
            document.querySelectorAll('.editar_required_{{$produto->id}}').forEach(field => {
                field.addEventListener('input', checkEditarFields_{{$produto->id}});
            });

            // Inicializa o botão com a classe disabled
            checkEditarFields_{{$produto->id}}();
        </script>
    </section>
@endforeach
@endif
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
    var btnVender = document.querySelectorAll("button.vender");
    var modalVender = document.querySelectorAll("section.modal-vender");

    btnVender.forEach(function(item, index) {
        item.addEventListener("click", function() {
                if (modalVender[index].classList.contains("abrir")) {
                    modalVender[index].classList.remove("abrir");
            } else {
                for (var i = 0; i < modalVender.length; i++) {
                    modalVender[i].classList.remove("abrir");
                }
                modalVender[index].classList.add("abrir");
            }
        });
    });

    var closeVender = document.querySelectorAll("img.close-vender");

    closeVender.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalVender[index].classList.remove("abrir");
        });
    })
</script>

<script>
    var btnEditar = document.querySelectorAll("button.editar");
    var modalEditar = document.querySelectorAll("section.modal-editar");

    btnEditar.forEach(function(item, index) {
        item.addEventListener("click", function() {
                if (modalEditar[index].classList.contains("abrir")) {
                    modalEditar[index].classList.remove("abrir");
            } else {
                for (var i = 0; i < modalEditar.length; i++) {
                    modalEditar[i].classList.remove("abrir");
                }
                modalEditar[index].classList.add("abrir");
            }
        });
    });

    var closeEditar = document.querySelectorAll("img.close-editar");

    closeEditar.forEach(function(item, index) {
        item.addEventListener("click", function() {
            modalEditar[index].classList.remove("abrir");
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
    var dinheiro = document.querySelectorAll('td.dinheiro');

    for (var z = 0; z < dinheiro.length; z++) {
        dinheiro[z].innerHTML = dinheiro[z].innerHTML.replace('.', ",");
    }
</script>

<script>
    $(document).ready(function(){
        // Aplica a máscara de moeda ao campo de entrada
        $('.preco').mask('#.##0,00', {reverse: true});
        $('.dinheiro').mask('#.##0,00', {reverse: true});

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
    });
</script>

<script>
    const saveButtonAdd = document.querySelector('.btnSave');
    saveButtonAdd.classList.add('disabled');

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
        } else {
            saveButton.classList.add('disabled');
        }
    }

    // Aplica o event listener a cada campo individualmente
    document.querySelectorAll('.save_required').forEach(field => {
        // Adiciona o event listener 'input' a cada campo
        field.addEventListener('input', checkFields);
    });
</script>
@endsection
