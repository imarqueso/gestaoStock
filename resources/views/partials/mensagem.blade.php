
<style>
    .alert-success {
        width: auto;
        height: auto;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        color: white;
        background-color: #056605;
        margin: 20px 0px;
        box-sizing: border-box;
    }

    .alert-danger {
        width: auto;
        height: auto;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        color: white;
        background-color: #792525;
        margin: 20px 0px;
        box-sizing: border-box;
    }

    .alert-warning {
        position: fixed;
        right: 0;
        bottom: 0px;
        width: auto;
        height: auto;
        display: flex;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s ease all;
        justify-content: center;
        align-items: center;
        z-index: 99999;
    }

    .alert-box {
        width: auto;
        max-width: 380px;
        height: auto;
        padding: 15px 20px;
        color: white;
        font-size: 12px;
        font-weight: 400;
        line-height: 20px;
        color: var(--light);
        background-color: #792525;
        box-sizing: border-box;
        position: relative;
    }

    .alert-box .barra {
        width: 100%;
        max-width: 380px;
        height: 6px;
        background-color: #792525;
        opacity: 0.6;
        position: absolute;
        left: 0px;
        bottom: 100%;
        transition: 5s ease all;
    }

    .alert-warning.ativo {
        opacity: 1;
        visibility: visible;
        transition: 0.3s ease all;
    }

    .alert-warning.ativo .barra {
        max-width: 0px;
        transition: 5s ease all;
    }

    @media (max-width: 600px) {
        .alert-box {
            max-width: 300px;
        }

        .alert-box .barra {
            max-width: 300px;
        }

        .alert-warning.ativo .barra {
            max-width: 0px;
            transition: 5s ease all;
        }
    }
</style>

@if(session('msg'))
    <div class="alert-success" role="alert">
        {{ session('msg') }}
    </div>
@endif
@if(session('msgf'))
    <div class="alert-danger" role="alert">
        {{ session('msgf') }}
    </div>
@endif
