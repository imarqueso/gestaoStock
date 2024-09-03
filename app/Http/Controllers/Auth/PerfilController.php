<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function view()
    {

        $perfil = User::select(
            'usuarios.id',
            'usuarios.nome',
            'usuarios.sobrenome',
            'usuarios.login',
            'usuarios.password',
            'usuarios.email',
            'usuarios.ativo',
            'usuarios.acesso',
            'usuarios.created_at',
        )->where('usuarios.id', '=', Auth::user()->id)->get();

        return view('perfil.index', compact('perfil'));
    }

    public function editar(Request $request, $id)
    {
        $perfil = User::find($id);

        // Definir as regras de validação

        $rules = [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
        ];

        // Se o login do usuário for diferente do informado no request, adicione a regra de validação do email
        if ($perfil->login !== $request->login) {
            $rules['login'] = 'required|string|max:255|unique:usuarios,login';
        }

        // Se o email do usuário for diferente do informado no request, adicione a regra de validação do login
        if ($perfil->email !== $request->email) {
            $rules['email'] = 'required|string|email|max:255|unique:usuarios,email';
        }

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6';
        }

        $messages = [
            'email.email' => 'Insira um e-mail válido!',
            'email.unique' => 'Este e-mail já está em uso!',
            'login.unique' => 'Este login já está em uso!',
            'password.min' => 'A senha precisa ter no mínimo 6 caracteres!',
        ];

        // Validar os dados
        $validator = Validator::make($request->all(), $rules, $messages);

        // Se a validação falhar, redireciona com a primeira mensagem de erro personalizada
        if ($validator->fails()) {
            // Extrair a primeira mensagem de erro e passá-la com 'msgf'
            $firstErrorMessage = $validator->errors()->first();
            return redirect()->route('perfilView')
                ->with('msgf', $firstErrorMessage)
                ->withInput(); // Preserva os dados do formulário
        }

        $dados = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'login' => $request->login,
            'email' => $request->email,
        ];

        // Verifique se a senha foi fornecida no request
        if ($request->filled('password')) {
            $dados['password'] = Hash::make($request->password);
        }

        $perfil->update($dados);

        return redirect()->route('perfilView')->with('msg', 'Dados pessoais editados com sucesso!');
    }
}
