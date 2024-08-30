<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomResetPasswordNotification;

class RecuperarController extends Controller
{
    // Exibe o formulário de recuperação de senha
    public function showResetRequestForm(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->ativo == 'Sim') {
                return redirect('/dashboard');
            } else if (Auth::user()->ativo == 'Não') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('msgf', 'Usuário inativo!');
            }
        } else {
            $mensagem = $request->session()->get('msgf');
            return view('recuperar.index', ['msgf' => $mensagem]);
        }
    }

    // Processa a solicitação de recuperação de senha
    public function sendResetLink(Request $request)
    {
        // Valida o e-mail
        $request->validate(['email' => 'required|email']);

        // Envia o link de recuperação usando o método padrão
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Verifica o status do envio e define mensagens apropriadas
        switch ($status) {
            case Password::RESET_LINK_SENT:
                return back()->with('msg', 'Link de recuperação enviado com sucesso.');
            case Password::INVALID_USER:
                return back()->with('msgf', 'Este e-mail não está registrado em nosso sistema.');
            default:
                return back()->with('msgf', 'Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.');
        }
    }

    // Exibe o formulário para alterar a senha
    public function showResetForm($token)
    {
        // Obtém o e-mail da URL (se presente)
        $email = request()->query('email');

        if (!$email) {
            return redirect()->route('password.request')->with('msgf', 'Link inválido ou expirado.');
        }

        // Renderiza o formulário de alteração de senha, passando o token e o e-mail
        return view('recuperar.reset', ['token' => $token, 'email' => $email]);
    }

    // Atualiza a senha do usuário
    public function resetPassword(Request $request)
    {
        // Validação básica
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6',
            'token' => 'required',
        ]);

        // Verifica se as senhas coincidem
        if ($request->password !== $request->password_confirmation) {
            return back()->with('msgf', 'As senhas não coincidem.');
        }

        // Tenta realizar o reset da senha
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect('/login')->with('msg', 'Senha alterada com sucesso!');
        }

        return back()->with('msgf', 'Ocorreu um erro ao alterar a senha.');
    }
}
