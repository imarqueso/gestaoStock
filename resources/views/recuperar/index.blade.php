<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Senha | Gestão Stock</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icones/favicon.png') }}">
</head>
<body>

    <style>
        body {
            width: 100%;
            min-width: 100vw;
            height: 100%;
            min-height: 100vh;
            padding: 0px;
            background: rgb(75,110,209);
            background: radial-gradient(circle, rgba(107,138,224,1) 0%, rgba(26,50,116,1) 100%);
            margin: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Sen', sans-serif;
            box-sizing: border-box;
            backdrop-filter: grayscale(0.3); 
        }

        .login-overlay {
            width: 100vw;
            height: 100vh;
            box-sizing: border-box;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 385px;
            height: auto;
            padding: 25px 30px;
            margin: 0px;
            background-color: #ffffffcf;
            border-radius: 5px 25px 5px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            -webkit-box-shadow: 10px 10px 53px -25px rgba(36,36,36,0.45);
            -moz-box-shadow: 10px 10px 53px -25px rgba(36,36,36,0.45);
            box-shadow: 10px 10px 53px -25px rgba(36,36,36,0.45);
            position: relative
        }

        .voltar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            text-decoration: none;
            background-color: #ffffffcf;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            left: 0px;
            bottom: 105%;
            cursor: pointer;
            transition: 0.3s ease all;
        }

        .voltar svg {
            width: 18px;
            height: auto;
            transform: rotate(180deg);
        }

        .voltar:hover {
            transition: 0.3s ease all;
            background-color: #ffffff;
        }

        .login-box .logo {
            width: 135px;
            height: auto;
            margin-bottom: 0px;
        }

        .login-box .titulo {
            font-size: 16px;
            color: rgba(26, 54, 133, 1);
            font-weight: 400;
            line-height: 20px;
            text-align: center;
            margin: 20px 0px 30px 0px;
        }

        .login-box form {
            width: 100%;
            height: auto;
            padding: 0px;
            margin: 0px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-box form input {
            width: 100%;
            height: 40px;
            background-color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            line-height: 20px;
            color: #777676;
            padding: 0px 15px;
            box-sizing: border-box;
            margin-bottom: 10px;
            outline: none;
        }

        .login-box form input::placeholder {
            font-size: 14px;
            line-height: 20px;
            color: #777676;
        }

        .login-box form button {
            width: 100%;
            height: 45px;
            background-color: rgba(26, 54, 133, 1);
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            outline: none;
            border: none;
            cursor: pointer;
            transition: 0.5s ease all;
        }

        .login-box form button:hover {
            background-color: rgba(75, 110, 209, 1);
            transition: 0.5s ease all;
        }

        @media (max-width: 470px) {
            .login-box {
                width: 90%;
                padding: 40px 30px;
            }

            .login-box .titulo {
                font-size: 14px;
                line-height: 22px;
                margin: 25px 0px;
            }
        }

        @media (max-width: 380px) {
            .login-box {
                width: 95%;
                padding: 25px 15px;
            }
            .login-box .titulo {
                font-size: 14px;
                line-height: 22px;
                margin: 15px 0px 25px 0px;
            }
        }

        button[disabled] {
            background-color: #464444 !important;
        }

        input, select, textarea {
            transition: 0.3s ease all;
            border: 2px solid transparent !important;
        }

        input:focus, select:focus, textarea:focus {
            border: 2px solid rgba(75, 110, 209, 1) !important;
            transition: 0.3s ease all;
        }

        .lbsenha {
            width: 100%;
            height: auto;
            padding: 0px;
            margin: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .view {
            width: 20px;
            height: auto;
            cursor: pointer;
            position: absolute;
            z-index: 99;
            right: 10px;
            top: 40%;
            transform: translateY(-50%);
            display: flex;
        }

        .noview {
            width: 20px;
            height: auto;
            cursor: pointer;
            position: absolute;
            z-index: 99;
            right: 10px;
            top: 40%;
            transform: translateY(-50%);
            display: none;
        }

        .disabled {
            opacity: 0.5;
            cursor: no-drop !important;
        }

        .recuperar {
            width: auto;
            height: auto;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
            color: rgba(75, 110, 209, 1);
            margin-top: 10px;
            transition: 0.3s ease all;
        }

        .recuperar:hover {
            text-decoration: underline rgba(75, 110, 209, 1);
            transition: 0.3s ease all;
        }

        .alert-danger,
        .alert-success {
            width: auto !important;
        }
    </style>

    <section class="login-overlay">
        <div class="login-box">
            <a href="{{ route('loginView') }}" class="voltar">
                <svg viewBox="0 0 126 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M60.8 11.5C60.7 11 63 8.2 66 5.3C69 2.4 72.1 0 73 0C73.8 0 86.1 11.6 100.3 25.8C114.4 39.9 126 52 126 52.5C126 53 114.1 65.4 73 106.5L60.5 94.2L62.6 91.3C63.8 89.8 70.7 82.9 77.9 76C85.2 69.1 91.1 63.2 91 62.8C91 62.3 70.5 62 0 62V44H45C69.8 44 90.2 43.7 90.4 43.3C90.7 42.8 84.2 35.8 75.9 27.5C67.7 19.3 60.9 12.1 60.8 11.5Z" fill="rgba(26, 54, 133, 1)"/>
                </svg>                    
            </a>
            <img class="logo" src="{{ asset('assets/img/logo_gestao_light.png') }}"/>
            <h3 class="titulo">Digite o e-mail a ser recuperado.</h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="email" id="email" name="email" required
                placeholder="E-mail" class="save_required">
                <button class="entrar btnSave">Recuperar Senha</button>
                @include('partials.mensagem')        
            </form>  
        </div>
    </section>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {

        var botoes = document.querySelectorAll('button.entrar');

        for (var s = 0; s < botoes.length; s++) {
            (function(index) {
            var formulario = botoes[index].closest('form');

                botoes[index].removeAttribute('disabled');
                botoes[index].innerText = 'Recuperar Senha';

            formulario.addEventListener('submit', function(event) {
                botoes[index].setAttribute('disabled', 'disabled');
                botoes[index].innerText = 'Enviando e-mail...';
            });
            })(s);
        }
        });
    </script>
    <script>
        // Seleciona todos os containers de senha
        const lbsenha = document.querySelectorAll('.lbsenha');

        lbsenha.forEach(container => {
            // Seleciona os botões e o input dentro do container
            const viewButton = container.querySelector('.view');
            const noViewButton = container.querySelector('.noview');
            const input = container.querySelector('.senhaview');

            // Evento para mostrar a senha
            viewButton.addEventListener('click', () => {
                if (input) {
                    input.type = 'text';
                }
                viewButton.style.display = 'none';
                noViewButton.style.display = 'flex';
            });

            // Evento para ocultar a senha
            noViewButton.addEventListener('click', () => {
                if (input) {
                    input.type = 'password';
                }
                noViewButton.style.display = 'none';
                viewButton.style.display = 'flex';
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
</body>
</html>