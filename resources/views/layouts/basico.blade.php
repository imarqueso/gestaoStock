<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>

    {{-- Estilo principal --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Fontes Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icones/favicon_gestao.png') }}">

    {{-- Tabela inteligente --}}
    <link type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    {{-- jQuery cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <header class="header-container">
        <section class="header-content">
            <span class="logo">
                <img src="{{ asset('assets/img/logo_gestao.png') }}"/>
            </span>
            <nav class="nav-content">
                <ul class="nav" id="nav">
                    <li>
                        <a href="{{ route('dashboardView') }}">
                        <svg width="161" height="160" viewBox="0 0 161 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M63.8097 1.16464C36.0577 7.41164 13.6548 26.7876 4.75575 52.2396C-11.0002 97.3036 13.6777 144.405 59.8097 157.321C64.7667 158.709 69.7528 159.133 80.8098 159.106C94.3838 159.074 95.9158 158.869 104.81 155.9C118.298 151.396 125.84 146.64 136.872 135.679C145.357 127.249 147.01 124.996 151.547 115.679C158.327 101.756 160.164 94.0786 160.164 79.6786C160.164 65.2786 158.327 57.6016 151.547 43.6786C147.01 34.3616 145.357 32.1086 136.872 23.6786C125.77 12.6486 118.18 7.88365 104.81 3.55165C96.7758 0.948645 93.3808 0.413645 82.8098 0.0876447C74.1878 -0.178355 68.2927 0.155644 63.8097 1.16464ZM97.8098 17.2426C114.407 22.1576 130.091 35.3336 137.688 50.7436C150.43 76.5916 145.784 104.777 125.42 125.171C111.761 138.849 98.9838 144.144 79.8098 144.071C69.9448 144.033 67.1738 143.636 60.3198 141.279C49.7508 137.645 41.6677 132.608 34.3267 125.082C27.0117 117.581 21.4897 108.528 18.5278 99.1786C15.3517 89.1556 15.3517 70.2016 18.5278 60.1786C25.6807 37.6036 45.8208 19.9056 69.1318 15.7096C76.1328 14.4496 91.0738 15.2486 97.8098 17.2426ZM73.1158 27.0916C70.7138 29.1576 70.3098 30.2506 70.3098 34.6786C70.3098 39.1066 70.7138 40.1996 73.1158 42.2656C81.1768 49.1986 93.1318 41.2446 89.8038 31.1616C87.6768 24.7146 78.4848 22.4736 73.1158 27.0916ZM43.1157 42.0916C40.7137 44.1576 40.3097 45.2506 40.3097 49.6786C40.3097 54.1066 40.7137 55.1996 43.1157 57.2656C51.1767 64.1986 63.1318 56.2446 59.8038 46.1616C57.6768 39.7146 48.4847 37.4736 43.1157 42.0916ZM103.143 41.1576C101.858 42.0586 96.8018 52.2366 90.2208 67.1726L79.4108 91.7086L75.6558 92.7196C64.5128 95.7206 59.1648 108.421 64.8128 118.47C69.1328 126.157 80.6538 129.511 88.5078 125.368C96.7208 121.036 100.219 109.914 95.9478 101.719L93.8438 97.6826L104.868 72.7696C116.542 46.3896 117.033 44.3486 112.473 41.1556C109.778 39.2676 105.84 39.2686 103.143 41.1576ZM28.1158 72.0916C25.7138 74.1576 25.3098 75.2506 25.3098 79.6786C25.3098 84.1066 25.7138 85.1996 28.1158 87.2656C33.4848 91.8836 42.6768 89.6426 44.8038 83.1956C48.1318 73.1126 36.1768 65.1586 28.1158 72.0916ZM118.116 72.0916C115.714 74.1576 115.31 75.2506 115.31 79.6786C115.31 84.1066 115.714 85.1996 118.116 87.2656C126.177 94.1986 138.132 86.2446 134.804 76.1616C132.677 69.7146 123.485 67.4736 118.116 72.0916Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produtosView') }}">
                        <svg width="181" height="160" viewBox="0 0 181 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M51.0885 2.127C46.3655 4.465 42.7755 8.664 41.0225 13.898C40.3135 16.016 39.8845 25.345 39.8845 38.648V59.999H47.8845H55.8845V38.534C55.8845 13.377 55.0335 14.999 68.2305 14.999H76.7075L77.0465 25.849C77.2735 33.143 77.8345 37.239 78.7565 38.349C79.8675 39.684 82.0695 39.999 90.3065 39.999C96.8895 39.999 100.909 39.575 101.685 38.799C102.477 38.007 102.885 33.755 102.885 26.299V14.999H112.314C119.552 14.999 122.107 15.364 123.314 16.57C124.642 17.899 124.885 21.378 124.885 39.07V59.999H132.967H141.049L140.715 37.249C140.352 12.522 140.121 11.403 134.224 5.80201C128.293 0.168006 126.993 -0.000995715 89.6665 4.28548e-06C56.7185 0.00100429 55.2175 0.0830033 51.0885 2.127ZM11.0885 72.127C6.06454 74.614 2.54454 78.895 0.918539 84.499C0.122539 87.243 -0.143461 97.45 0.0715385 116.999C0.427539 149.452 0.722539 150.786 8.80754 156.499L13.0535 159.499L48.2185 159.788C78.4945 160.037 83.9665 159.855 87.5705 158.48C92.2965 156.677 98.4446 150.443 99.6096 146.274C100.614 142.68 100.623 87.351 99.6205 83.767C98.5065 79.79 93.0095 73.961 88.3935 71.864C84.7665 70.217 81.0925 70.041 49.8845 70.022C16.6905 70.001 15.2215 70.081 11.0885 72.127ZM105.88 75.749C107.498 78.911 109.047 82.286 109.322 83.249C109.674 84.48 110.843 84.999 113.265 84.999H116.708L117.047 95.849C117.274 103.143 117.835 107.239 118.757 108.349C119.868 109.684 122.07 109.999 130.307 109.999C136.89 109.999 140.909 109.575 141.685 108.799C142.477 108.007 142.885 103.755 142.885 96.299V84.999H152.314C159.552 84.999 162.107 85.364 163.314 86.57C165.674 88.931 165.674 141.067 163.314 143.428C161.966 144.775 158.049 144.999 135.782 144.999C111.916 144.999 109.782 145.14 109.322 146.749C109.047 147.712 107.498 151.087 105.88 154.249L102.938 159.999L133.662 159.977C161.215 159.957 164.799 159.767 168.394 158.134C173.01 156.037 178.507 150.208 179.621 146.231C180.617 142.67 180.617 87.328 179.621 83.767C178.507 79.79 173.01 73.961 168.394 71.864C164.799 70.231 161.215 70.041 133.662 70.021L102.938 69.999L105.88 75.749ZM37.0465 95.849C37.2735 103.143 37.8345 107.239 38.7565 108.349C39.8675 109.684 42.0695 109.999 50.3065 109.999C56.8895 109.999 60.9085 109.575 61.6845 108.799C62.4765 108.007 62.8845 103.755 62.8845 96.299V84.999H72.3135C79.5515 84.999 82.1065 85.364 83.3135 86.57C85.6735 88.931 85.6735 141.067 83.3135 143.428C81.9525 144.789 77.5905 144.999 50.7475 144.999C31.2945 144.999 19.0325 144.614 17.8185 143.964C15.9775 142.978 15.8845 141.589 15.8845 115.014C15.8845 89.483 16.0335 87.011 17.6345 86.079C18.5975 85.518 23.2825 85.046 28.0465 85.029L36.7075 84.999L37.0465 95.849Z"/>
                            </svg>
                            Produtos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendasView') }}">
                        <svg width="181" height="120" viewBox="0 0 181 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 60V120H90.5H181V60V0H90.5H0V60ZM145.851 19.732C146.547 22.334 148.203 25.888 149.531 27.63C152.132 31.039 159.27 35 162.816 35H165V60V85H162.816C159.27 85 152.132 88.961 149.531 92.37C148.203 94.112 146.547 97.666 145.851 100.268L144.585 105H90.312H36.038L35.438 102.25C33.627 93.954 28.046 87.807 20.49 85.786L16 84.585V60V35.415L20.49 34.214C28.046 32.193 33.627 26.046 35.438 17.75L36.038 15H90.312H144.585L145.851 19.732ZM80.703 31.391C63.07 37.918 55.324 56.878 63.48 73.548C66.331 79.376 70.777 83.782 77.278 87.222C83.385 90.454 96.566 90.453 103.127 87.22C126.083 75.91 126.083 44.004 103.127 32.801C97.42 30.016 86.307 29.317 80.703 31.391Z"/>
                            </svg>
                            Vendas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('notasView') }}">
                        <svg width="151" height="150" viewBox="0 0 151 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M30 60V120H70.5H111V100V80H131H151V40V0H90.5H30V60ZM0 90V150H50.5H101V142.5V135H58.5H16V82.5V30H8H0V90ZM120 105.237V120.475L135 105.5C143.25 97.264 150 90.407 150 90.263C150 90.118 143.25 90 135 90H120V105.237Z"/>
                            </svg>
                            Notas
                        </a>
                    </li>
                    @if (Auth::user()->acesso === 'Admin')
                    <li>
                        <a href="{{ route('usuariosView') }}">
                        <svg width="199" height="160" viewBox="0 0 199 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M37.9622 0.503363C36.5832 0.954363 34.0622 2.04437 32.3602 2.92437C30.6582 3.80537 27.7922 6.20336 25.9912 8.25336C24.1912 10.3044 22.0992 13.4624 21.3432 15.2724C20.5872 17.0824 19.9682 21.2924 19.9682 24.6274C19.9682 27.9624 20.5872 32.1724 21.3432 33.9824C22.0992 35.7924 24.1942 38.9544 25.9982 41.0094C27.8022 43.0644 30.9672 45.6064 33.0322 46.6594C35.0962 47.7124 38.5942 48.8634 40.8062 49.2174C43.0182 49.5714 47.1012 49.3154 49.8792 48.6484C52.6582 47.9824 56.7092 46.1484 58.8832 44.5744C61.0562 42.9994 64.0202 39.6894 65.4692 37.2164C67.0032 34.5984 68.3292 30.5094 68.6452 27.4244C68.9442 24.5114 68.6762 20.2334 68.0512 17.9194C67.4252 15.6054 65.4592 11.8044 63.6822 9.47436C61.9042 7.14336 58.3852 4.17437 55.8612 2.87537C53.3382 1.57737 48.8422 0.327365 45.8712 0.0983647C42.8992 -0.129635 39.3402 0.0523635 37.9622 0.503363ZM152.962 0.503363C151.583 0.954363 149.062 2.04437 147.36 2.92437C145.658 3.80537 142.792 6.20336 140.991 8.25336C139.191 10.3044 137.099 13.4624 136.343 15.2724C135.587 17.0824 134.968 21.2924 134.968 24.6274C134.968 27.9624 135.587 32.1724 136.343 33.9824C137.099 35.7924 139.194 38.9544 140.998 41.0094C142.802 43.0644 145.967 45.6064 148.032 46.6594C150.096 47.7124 153.594 48.8634 155.806 49.2174C158.018 49.5714 162.101 49.3154 164.879 48.6484C167.658 47.9824 171.709 46.1484 173.883 44.5744C176.056 42.9994 179.02 39.6894 180.469 37.2164C182.003 34.5984 183.329 30.5094 183.645 27.4244C183.944 24.5114 183.676 20.2334 183.051 17.9194C182.425 15.6054 180.459 11.8044 178.682 9.47436C176.904 7.14336 173.385 4.17437 170.861 2.87537C168.338 1.57737 163.842 0.327365 160.871 0.0983647C157.899 -0.129635 154.34 0.0523635 152.962 0.503363ZM92.4682 40.5074C90.8182 40.9424 87.6372 42.2404 85.4002 43.3914C83.1622 44.5414 79.7002 47.2884 77.7062 49.4954C75.7122 51.7024 73.2682 54.9974 72.2752 56.8174C70.8922 59.3514 70.4682 62.3544 70.4682 69.6274C70.4682 76.9004 70.8922 79.9034 72.2752 82.4374C73.2682 84.2574 75.7152 87.5554 77.7112 89.7644C79.7082 91.9744 83.6202 94.9574 86.4052 96.3944C90.4882 98.4994 92.9202 99.0174 98.9682 99.0664C105.228 99.1174 107.407 98.6664 112.15 96.3374C115.274 94.8024 119.209 91.9774 120.893 90.0594C122.578 88.1414 124.966 84.6714 126.2 82.3494C128.018 78.9284 128.444 76.5144 128.444 69.6274C128.444 62.7404 128.018 60.3264 126.2 56.9054C124.966 54.5834 122.578 51.1134 120.893 49.1954C119.209 47.2774 115.412 44.5244 112.456 43.0774C109.109 41.4404 104.89 40.3094 101.275 40.0814C98.0812 39.8794 94.1182 40.0714 92.4682 40.5074ZM107.731 57.2994C109.168 58.3724 111.212 60.4124 112.272 61.8324C113.598 63.6084 114.199 66.0384 114.199 69.6274C114.199 73.2164 113.598 75.6464 112.272 77.4224C111.212 78.8424 109.186 80.8684 107.77 81.9254C106.355 82.9824 103.199 84.0724 100.758 84.3474C97.4492 84.7204 95.2392 84.2964 92.0692 82.6794C88.9912 81.1084 87.2922 79.3534 85.9152 76.3184C84.8682 74.0134 84.0122 71.0024 84.0122 69.6274C84.0122 68.2524 84.8672 65.2434 85.9132 62.9414C87.1892 60.1304 89.0712 58.0724 91.6412 56.6784C94.4362 55.1614 96.7692 54.7024 100.292 54.9744C103.004 55.1844 106.262 56.2024 107.731 57.2994ZM24.7022 60.7154C22.6312 61.2034 19.2332 62.4714 17.1512 63.5344C15.0692 64.5964 11.5042 67.3264 9.22919 69.6014C6.95419 71.8764 4.06519 75.8504 2.80919 78.4324C1.36119 81.4074 0.384191 85.5534 0.141191 89.7464C-0.207809 95.7674 -0.0318089 96.5134 2.08519 97.9964C4.12619 99.4264 8.59019 99.6274 38.2942 99.6274H72.1752L68.9402 95.9424C67.1612 93.9164 64.6482 89.9784 63.3572 87.1924C62.0652 84.4064 60.5002 79.6814 59.8792 76.6924C59.2582 73.7034 58.9682 69.3174 59.2362 66.9454L59.7222 62.6314L54.6632 61.1294C51.4242 60.1674 45.8052 59.6634 39.0362 59.7274C33.2242 59.7834 26.7742 60.2274 24.7022 60.7154ZM146.468 60.2994C145.368 60.5414 143.19 61.2354 141.628 61.8424C139.179 62.7924 138.852 63.3704 139.254 66.0364C139.51 67.7364 139.361 71.7114 138.921 74.8694C138.482 78.0274 136.97 83.1284 135.561 86.2054C134.153 89.2814 131.605 93.5604 129.9 95.7134L126.8 99.6274H160.884C194.315 99.6274 195.009 99.5864 197.095 97.5004C198.937 95.6584 199.151 94.5774 198.685 89.4434C198.376 86.0334 197.026 81.2214 195.507 78.1184C194.02 75.0794 190.663 70.7404 187.821 68.1854C184.234 64.9604 180.892 63.0664 176.266 61.6374C171.318 60.1094 167.204 59.6554 159.113 59.7434C153.258 59.8074 147.568 60.0574 146.468 60.2994ZM72.0132 110.719C69.5632 111.2 65.2372 112.729 62.3992 114.117C59.5612 115.505 54.9222 118.959 52.0892 121.792C49.2562 124.625 45.5182 129.826 43.7842 133.35C41.3162 138.363 40.5342 141.428 40.1882 147.442C39.7872 154.412 39.9522 155.313 41.9622 157.127C44.1222 159.076 45.5832 159.127 99.6612 159.127H155.145L157.056 156.766C158.257 155.283 158.968 152.851 158.968 150.226C158.968 147.928 158.271 143.37 157.418 140.097C156.566 136.824 154.516 132.039 152.863 129.463C151.21 126.888 147.898 122.974 145.503 120.766C143.108 118.558 138.97 115.655 136.308 114.314C133.646 112.973 129.083 111.37 126.169 110.751C123.047 110.089 111.747 109.672 98.6692 109.737C86.4582 109.797 74.4632 110.239 72.0132 110.719ZM129.596 127.335C131.867 128.55 135.533 131.598 137.744 134.11C139.955 136.621 142.056 139.843 142.414 141.27C142.772 142.696 142.889 144.04 142.673 144.256C142.457 144.472 122.623 144.531 98.5972 144.388L54.9142 144.127L57.5952 138.748C59.3562 135.215 61.7892 132.298 64.6882 130.248C67.1142 128.531 70.5332 126.584 72.2842 125.921C74.5182 125.075 82.9272 124.777 100.468 124.921C124.13 125.116 125.689 125.245 129.596 127.335Z"/>
                            </svg>
                            Usuários
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}">
                        <svg width="164" height="140" viewBox="0 0 164 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 70V140H30.5H61V130V120H41H21V70V20H41H61V10V0H30.5H0V70ZM102.493 23.007L95.539 30.014L110.507 45.007L125.475 60H87.737H50V70V80H87.737H125.475L110.498 95.002L95.521 110.004L102.684 117.167L109.847 124.33L115.674 119.269C124.816 111.327 164 71.286 164 69.886C164 68.461 111.782 16 110.364 16C109.859 16 106.317 19.153 102.493 23.007Z"/>
                            </svg>
                            Sair
                        </a>
                    </li>
                </ul>
                <a href="{{ route('perfilView') }}" class="user"><img src="{{ asset('assets/img/icones/perfil.svg') }}" alt="">Olá,&nbsp;<strong>{{ Auth::user()->nome }}</strong></a>
                <input id="hamburguer" type="checkbox" style="display: none;">
                <label for="hamburguer" class="hamburguer">
                    <div id="menu"></div>
                </label>
            </nav>
        </section>
    </header>
    <section class="titulo-container">
        <div class="titulo-content">
            <h1><img src="{{ asset('assets/img/icones/star.svg') }}">@yield('pagina')</h1>
        </div>
    </section>

    <script>
        document.getElementById("menu").addEventListener("click", function () {
            document.getElementById("nav").classList.toggle("abrir-menu");
        });
    </script>

    @yield('conteudo')

    {{--  <footer class="footer-container">
        <span>Powered by</span>
        <a href="https://igormarques.me" target="_blank">
            <svg width="53px" height="25px" viewBox="0 0 440 218" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M129.672 61.8083C134.086 54.0263 153.116 39.2406 173.678 39.2406C190.424 39.2406 203.821 44.6102 223.137 14.7274C199.251 50.265 135.747 125.698 72.8146 143.13C104.051 131.441 191.606 115.812 305.308 139.366M331.789 145.464C331.789 145.464 329.19 144.81 327.895 144.49M216.516 74.6485C207.17 73.6109 187.542 76.3605 183.804 95.6598M183.804 95.6598C181.727 104.22 178.975 123.908 189.256 124.842C191.982 125.09 207.17 125.076 216.516 102.664C218.204 100.329 214.024 95.6598 183.804 95.6598ZM183.804 95.6598C182.765 95.9192 179.52 95.6598 173.678 100.329M280.384 131.846C281.366 127.823 282.496 122 283.186 115.893M283.186 115.893C284.318 105.855 284.258 95.0507 280.384 90.2124C287.394 89.1748 302.971 88.8117 309.202 95.6598C314.394 100.199 320.885 110.601 305.308 115.893C303.411 117.32 296.331 119.317 283.186 115.893ZM283.186 115.893C289.261 123.444 302.192 138.71 305.308 139.366M305.308 139.366C306.602 139.634 307.9 139.908 309.202 140.186M309.202 140.186L339.188 80.485L327.895 144.49M309.202 140.186C315.36 141.503 321.592 142.936 327.895 144.49M327.895 144.49C349.444 123.155 393.787 80.485 398.772 80.485C401.039 80.485 393.46 91.9998 382.458 115.893M382.458 115.893C369.265 144.544 351.151 188.096 339.188 212C353.338 211.741 398.811 212 425.643 181.261C436.965 168.291 447.104 130.679 382.458 115.893ZM382.458 115.893C307.542 108.759 216.516 90.2124 7 102.664L24.1352 163.363C30.7556 181.261 50.6168 195.375 78.6561 167.643C132.296 116.023 268.153 11.2256 382.458 5M249.229 80.485C240.661 80.3262 224.772 85.6291 225.084 104.998C224.824 111.224 228.589 124.064 245.724 127.177C252.344 128.379 271.653 124.406 272.984 105.776C273.763 94.8816 266.364 80.485 249.229 80.485Z" stroke="#0b2766" stroke-width="12"></path>
            </svg>
        </a>
    </footer>  --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var botoes = document.querySelectorAll('button.salvar');

        for (var s = 0; s < botoes.length; s++) {
            (function(index) {
            var formulario = botoes[index].closest('form');

            formulario.addEventListener('submit', function(event) {
                botoes[index].setAttribute('disabled', 'disabled');
                botoes[index].innerText = 'Enviando...';
            });
            })(s);
        }
        });
    </script>

    {{-- Tabela inteligente --}}
     <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js">
    </script>
</html>
