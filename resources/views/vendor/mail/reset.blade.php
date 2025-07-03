<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    {{-- Header --}}
                    <tr>
                        <td class="header" style="background-color: rgba(26, 54, 133, 1); padding: 20px; text-align: center;">
                            <a href="{{ config('app.url') }}" style="color: #ffffff; text-decoration: none; font-size: 24px; font-weight: bold;">
                                <img src="{{ asset('assets/img/logo_gestao.png') }}" style="with: 135px; height: auto;"/>
                            </a>
                        </td>
                    </tr>

                    {{-- Corpo do e-mail --}}
                    <div style="padding: 20px; font-family: Arial, sans-serif; line-height: 1.6;">
                        <h1 style="color: #333333; font-size: 22px;">Solicitação de Redefinição de Senha</h1>
                
                        <p style="color: #666666; font-size: 18px;">Olá,</p>
                
                        <p style="color: #666666; font-size: 18px;">Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.</p>

                        <a href="{{ $resetUrl }}" style="display: inline-block; padding: 10px 20px; background-color: rgba(75, 110, 209, 1); color: white; text-decoration: none; border-radius: 5px;">
                            Redefinir Senha
                        </a>
                
                        <p style="color: #666666; font-size: 18px;">Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.</p>
                    </div>

                    {{-- Footer --}}
                    <tr>
                        <td class="footer" style="background-color: #e0e2e3; padding: 10px; text-align: center;">
                            <p style="font-family: Arial, sans-serif; font-size: 12px; color: #00000;">
                                Gestão Stock. All rights reserved.
                            </p>
                        </td>
                    </tr>                      
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
