
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
        left: 50%;
        bottom: -38px;
        transform: translate(-50%, -50%);
        width: 80%;
        height: auto;
        display: flex;
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

    .alert-warning span {
        width: auto;
        height: auto;
        padding: 5px 10px;
        background-color: #792525;
        color: var(--light);
        font-size: 10px;
        font-weight: 400;
        cursor: pointer;
        position: absolute;
        bottom: 100%;
        right: 0px;
        transition: 0.3s ease all;
    }

    .alert-warning span:hover {
        background-color: #bf4949;
        transition: 0.3s ease all;
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
