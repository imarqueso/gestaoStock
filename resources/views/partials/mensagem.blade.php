
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
        top: 50%;
        transform: translate(-50%, -50%);
        width: auto;
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
        padding: 20px;
        border-radius: 6px;
        color: white;
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        color: var(--light);
        background-color: #792525;
        margin: 0px 0px 20px 0px;
        box-sizing: border-box;
        position: relative;
    }

    .alert-warning span {
        width: auto;
        height: auto;
        padding: 5px 10px;
        border-radius: 6px;
        background-color: #792525;
        color: var(--light);
        font-size: 10px;
        font-weight: 400;
        cursor: pointer;
        position: absolute;
        bottom: 105%;
        right: 0px;
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
