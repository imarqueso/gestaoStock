<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrar | Gestão Stock</title>
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

        .login-box form input  {
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
            <img class="logo" src="{{ asset('assets/img/logo_gestao_light.png') }}"/>
            <h3 class="titulo">Entre para gerenciar seu estoque.</h3>
            <form method="post">
                @csrf
                <input type="text" id="user" name="login" required
                placeholder="Login ou E-mail" class="save_required">
                <label class="lbsenha">
                    <input type="password" id="password" name="password" required
                    placeholder="Senha" class="senhaview save_required">
                    <svg viewBox="0 0 181 141" fill="none" xmlns="http://www.w3.org/2000/svg" class="view">
                        <path d="M56 7.30007C59 5.80007 65.3 3.60007 70 2.40007C76.4 0.60007 81.3 0.10007 90 0.10007C98 6.97523e-05 104 0.60007 109.5 1.90007C113.9 3.00007 120.2 5.00007 123.5 6.50007C126.8 8.00007 133.1 11.5001 137.5 14.4001C141.9 17.3001 148.6 22.5001 152.4 26.1001C156.2 29.6001 162 36.2001 165.4 40.6001C168.7 45.1001 173.6 52.8001 176.2 57.6001C179.3 63.4001 180.9 67.7001 180.9 70.0001C180.9 71.9001 179.6 76.2001 177.9 79.5001C176.2 82.8001 172.4 89.1001 169.5 93.5001C166.6 97.9001 161.1 104.8 157.4 108.9C153.6 113 146.9 119 142.5 122.3C138.1 125.5 130.9 129.9 126.5 132.1C122.1 134.2 114.9 136.9 110.5 138.1C104.3 139.9 99.8 140.3 90.5 140.3C81.1 140.3 76.8 139.9 70.5 138.1C66.1 136.9 58.9 134.2 54.5 132.1C50.1 130 42.9 125.6 38.5 122.3C34.1 119 27.4 113 23.7 108.9C19.9 104.8 14.4 97.9001 11.5 93.5001C8.5 89.1001 4.7 82.5001 3.1 78.7001C1.4 75.0001 0 71.0001 0 69.8001C0 68.5001 1.7 64.1001 3.8 60.0001C5.9 55.9001 9.8 49.1001 12.5 45.0001C15.3 40.9001 21.3 33.7001 26 28.9001C30.7 24.2001 38.1 17.9001 42.5 15.1001C46.9 12.2001 53 8.70007 56 7.30007Z" fill="#1A3685"/>
                        <path d="M67 31.1001C69.5 29.7001 73.7 27.7001 76.5 26.7001C80.4 25.4001 83.9 25.0001 92 25.3001C101.4 25.5001 103.2 25.9001 109.2 28.8001C113 30.5001 118.5 34.4001 121.6 37.2001C124.7 40.1001 128.4 44.5001 129.8 47.0001C131.2 49.5001 133.2 54.1001 134.2 57.2001C135.2 60.4001 136 66.0001 136 69.7001C136 73.5001 135.3 79.0001 134.4 82.0001C133.5 85.0001 131.6 89.7001 130.2 92.5001C128.8 95.2001 125.3 99.9001 122.3 102.7C119.3 105.7 114.3 109.3 110.8 110.9C107.3 112.5 101.6 114.4 98 115C94.3 115.7 89.1 115.9 86 115.5C83 115.1 78 113.9 75 112.7C72 111.6 68.4 110 67 109.1C65.6 108.3 62.8 106.2 60.7 104.5C58.5 102.9 55 98.8001 52.8 95.5001C50.7 92.2001 48 86.6001 46.9 83.0001C45.8 79.4001 45 73.8001 45 70.5001C45 67.2001 45.7 61.8001 46.5 58.5001C47.4 55.2001 49.3 50.5001 50.7 48.0001C52.2 45.5001 55.4 41.3001 57.9 38.6001C60.4 36.0001 64.5 32.6001 67 31.1001Z" fill="white"/>
                        <path d="M90.3999 46.5001C89.9999 44.3001 90.0999 41.9001 90.4999 41.1001C91.0999 40.2001 92.4999 40.0001 95.1999 40.4001C97.2999 40.7001 101.1 42.0001 103.7 43.2001C106.4 44.4001 110.4 47.5001 112.8 50.0001C115.4 52.7001 117.7 56.5001 118.7 59.5001C119.6 62.3001 120.3 67.2001 120.3 70.5001C120.2 73.8001 119.4 78.5001 118.5 81.0001C117.6 83.5001 115.3 87.4001 113.4 89.8001C111.3 92.4001 107.6 95.2001 103.8 97.1001C97.9999 99.9001 96.8999 100.1 89.4999 99.8001C84.4999 99.5001 80.1999 98.7001 77.9999 97.5001C76.0999 96.5001 72.7999 94.3001 70.5999 92.6001C68.3999 90.8001 65.4999 87.0001 63.7999 83.5001C61.7999 79.2001 60.9999 76.3001 61.4999 69.5001L67.9999 69.9001C72.6999 70.1001 75.4999 69.8001 77.9999 68.5001C79.8999 67.6001 82.9999 65.4001 84.7999 63.6001C86.7999 61.7001 88.6999 58.5001 89.5999 55.5001C90.4999 52.4001 90.7999 49.0001 90.3999 46.5001Z" fill="#1A3685"/>
                    </svg>                   
                    <svg viewBox="0 0 201 162" fill="none" xmlns="http://www.w3.org/2000/svg" class="noview">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.49992 0.600213C9.59992 1.00021 12.0999 2.40021 13.9999 3.80021C15.8999 5.30021 23.8999 11.5002 31.7999 17.7002C39.5999 23.9002 46.4999 29.0002 46.9999 29.0002C47.4999 29.0002 50.9999 27.0002 54.7999 24.5002C58.4999 22.0002 64.6999 18.6002 68.4999 17.1002C72.2999 15.5002 78.9999 13.5002 83.2999 12.6002C87.4999 11.7002 95.5999 11.0002 101.2 11.0002C107.8 11.0002 114.4 11.7002 119.5 12.9002C123.9 14.0002 130.2 16.0002 133.5 17.5002C136.8 19.0002 143.3 22.6002 148 25.7002C152.7 28.7002 160.3 35.1002 165 39.9002C169.7 44.6002 176 52.3002 179.1 57.0002C182.2 61.7002 186.2 68.3002 187.9 71.7002C189.6 75.2002 191 79.3002 191 81.0002C191 82.7002 189.7 86.7002 188 90.0002C186.3 93.3002 183 99.0002 180.7 102.7C178.3 106.5 174 112.3 171.2 115.7C168.3 119.2 166.2 122.3 166.4 122.7C166.6 123.2 174.3 129.3 183.4 136.5C192.6 143.7 200.3 150.4 200.6 151.5C200.9 152.6 201 154.6 200.8 155.9C200.6 157.2 199.2 159.2 197.7 160.4C195.4 162.1 194.5 162.3 192.2 161.4C190.7 160.9 169.5 144.7 145 125.4C120.5 106.2 77.9999 72.9002 50.6999 51.5002C14.3999 23.1002 0.69992 11.8002 0.29992 10.0002C-7.96169e-05 8.60021 0.29992 6.40021 0.99992 5.00021C1.59992 3.70021 3.19992 2.00021 4.39992 1.30021C5.49992 0.600213 7.39992 0.300213 8.49992 0.600213V0.600213ZM25.5999 52.0002C25.7999 52.0002 32.4999 57.1002 54.9999 74.5002V80.5002C54.9999 83.8002 55.6999 89.2002 56.5999 92.5002C57.3999 95.8002 59.2999 100.7 60.7999 103.4C62.2999 106.1 65.6999 110.5 68.4999 113.3C71.4999 116.3 76.2999 119.6 80.4999 121.6C84.2999 123.5 90.6999 125.5 94.4999 126.1C100.3 127 102.9 127 118 124L128.4 132.3C134.2 136.8 138.9 140.8 138.9 141.3C139 141.7 136.6 143.1 133.7 144.5C130.9 145.8 124.9 147.9 120.5 149.1C114.5 150.7 109.5 151.3 100.5 151.3C90.9999 151.3 86.7999 150.9 80.4999 149.1C76.0999 147.9 69.2999 145.4 65.4999 143.6C61.6999 141.9 55.3999 138.2 51.4999 135.5C47.6999 132.7 40.6999 126.7 35.9999 122C31.2999 117.3 24.7999 109.4 21.5999 104.5C18.2999 99.5002 14.3999 92.8002 12.7999 89.5002C11.2999 86.2002 9.99992 82.6002 9.99992 81.5002C9.99992 80.4002 11.0999 77.0002 12.2999 74.0002C13.5999 71.0002 16.9999 64.8002 19.8999 60.3002C22.7999 55.7002 25.2999 52.0002 25.5999 52.0002V52.0002Z" fill="#1A3685"/>
                        <path d="M79.4998 40.8C81.6998 39.6 85.2998 38.1 87.4998 37.3C90.0998 36.5 95.1998 36.1 102 36.3C111.8 36.5 113 36.8 120 40.2C124.7 42.5 129.5 45.8 132.8 49.2C135.9 52.2 139.4 57.1 141 60.5C142.5 63.8 144.3 69 145 72C145.8 75.2 146 80.4 145.7 84.5C145.4 88.3 144.7 93.1 144.1 95C143.5 96.9 142.4 99.4 141.6 100.5C140.2 102.5 140.2 102.5 136.4 99.8C134.2 98.3 131.7 96.3 130.7 95.3C129.2 93.7 129.1 92.8 130.1 87C131 81.7 130.9 79.4 129.6 74.3C128.7 70.8 126.7 66.1 125.2 63.8C123.6 61.4 120.1 58.1 117.4 56.3C114.7 54.6 110.5 52.6 108 51.9C105.5 51.3 102.6 51 101.5 51.4C99.6998 52 99.5998 52.6 100.2 56.8C100.7 59.4 100.5 63.2 99.9998 65.3C99.1998 68.2 98.5998 68.9 97.1998 68.4C96.2998 68.1 89.6998 63.2 69.7998 47.5L72.6998 45.2C74.1998 43.9 77.2998 41.9 79.4998 40.8Z" fill="white"/>
                    </svg>                        
                </label>
                <button class="entrar btnSave">Entrar</button>
                <a href="{{ route('password.request') }}" class="recuperar">Esqueceu a senha?</a>
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
                botoes[index].innerText = 'Entrar';

            formulario.addEventListener('submit', function(event) {
                botoes[index].setAttribute('disabled', 'disabled');
                botoes[index].innerText = 'Entrando...';
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