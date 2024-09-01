@extends('layouts.basico')

@section('titulo', 'Grupos de Produtos | Gestão Stock')
@section('pagina', 'Grupos de Produtos')

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
        max-width: 1220px;
        height: auto;
        padding: 60px 20px 80px 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .produtos-box {
        width: 100%;
        max-height: 803px;
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
        min-width: 1135px !important;
        height: auto;
        background-color: transparent;
        border-collapse: separate !important;
        overflow: hidden; 
        border: none;
        border-radius: 10px;
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

    button[disabled] {
        background-color: #464444 !important;
    }
</style>

<section class="produtos-container">
    <div class="produtos-content">
        @include('partials.mensagem')
        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
        <button class="btn-principal">Cadastrar Grupo</button>
        @endif
        <div class="produtos-box">
            <h3>Grupos cadastrados</h3>
            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
            <section class="modal-container modal-cadastrar">
                <div class="modal-content">
                    <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-cadastrar">
                    <h3 class="titulo-modal">Cadastrar Grupo</h3>
                    <form method="post" action="{{ route('cadastrarGrupo') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="grupo" placeholder="Grupo*" required class="save_required">
                        <button class="salvar btnSave" type="submit">Salvar</button>
                    </form>
                </div>
            </section>
            @endif
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Estoque</th>
                        <th>Vendidos</th>
                        <th>Faturamento</th>
                        <th>Cadastro</th>
                        @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                        <th>Editar</th>
                        <th>Excluir</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $grupo)
                        <tr>
                            <td><a href="{{ route('produtosView', $grupo->id) }}">{{$grupo->grupo}}</a></td>
                            <td>{{$quantidade}}</td>
                            <td>{{$vendidos}}</td>
                            <td>{{$faturamento}}</td>
                            <td>{{\Carbon\Carbon::parse($grupo->created_at)->format('d/m/Y')}}</td>
                            @if (Auth::user()->acesso == 'Admin' || Auth::user()->acesso == 'Master')
                            <td><button class="editar"><img src="{{ asset('assets/img/icones/editar.svg') }}"></button></td>
                            <td>
                                <div class="td-excluir">
                                    <span class="excluir">
                                        <img src="{{ asset('assets/img/icones/excluir.svg') }}">
                                    </span>
                                    <form method="post"
                                    action="{{ route('excluirGrupo', $grupo->id) }}"
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
@foreach ($grupos as $grupo)
    <section class="modal-container modal-editar">
        <div class="modal-content">
            <img src="{{ asset('assets/img/icones/close.svg') }}" class="close close-editar">
            <h3 class="titulo-modal">Editar Grupo</h3>
            <form method="post" action="{{ route('editarGrupo', $grupo->id) }}" enctype="multipart/form-data" id="form_editar_{{$grupo->id}}">
                @csrf
                <label>
                    <span>Grupo*</span>
                    <input type="text" value="{{$grupo->grupo}}" name="grupo" placeholder="Grupo*" required class="editar_required_{{$grupo->id}}">
                </label>
                <button class="salvar btnEdit_{{$grupo->id}} disabled" type="submit">Salvar</button>
            </form>
        </div>

        <script>
            // Função para verificar os campos de edição do produto específico
            function checkEditarFields_{{$grupo->id}}() {
                const requiredFields = document.querySelectorAll('.editar_required_{{$produto->id}}');
                const editButton = document.querySelector('.btnEdit_{{$produto->id}}');

                const allFilled = Array.from(requiredFields).every(field => {
                    return field.value.trim() !== '';  // Verifica se todos os campos estão preenchidos
                });

                // Controla o estado do botão "Salvar"
                if (allFilled) {
                    editButton.classList.remove('disabled');
                    editButton.removeAttribute('disabled');
                } else {
                    editButton.classList.add('disabled');
                    editButton.setAttribute('disabled', 'disabled');
                }
            }

            // Aplica o event listener a cada campo individualmente
            document.querySelectorAll('.editar_required_{{$produto->id}}').forEach(field => {
                field.addEventListener('input', checkEditarFields_{{$grupo->id}});
            });

            // Inicializa o botão com a classe disabled
            checkEditarFields_{{$grupo->id}}();
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveButtonAdd = document.querySelector('.btnSave');
        saveButtonAdd.classList.add('disabled');
        saveButtonAdd.setAttribute('disabled', 'disabled');
    });

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
