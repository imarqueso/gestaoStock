<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function view()
    {

        $usuarios = User::select(
            'usuarios.id',
            'usuarios.nome',
            'usuarios.sobrenome',
            'usuarios.login',
            'usuarios.password',
            'usuarios.email',
            'usuarios.ativo',
            'usuarios.acesso',
            'usuarios.created_at',
        )->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function cadastrar(Request $request)
    {
        // Definir as regras de validação
        $rules = [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:usuarios,login',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'ativo' => 'required',
            'acesso' => 'required',
        ];

        // Mensagens personalizadas de erro
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
            return redirect()->route('usuariosView')
                ->with('msgf', $firstErrorMessage)
                ->withInput(); // Preserva os dados do formulário
        }

        // Criação do usuário
        $usuario = User::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ativo' => $request->ativo,
            'acesso' => $request->acesso,
        ]);

        return redirect()->route('usuariosView')->with('msg', 'Usuário cadastrado com sucesso!');
    }

    public function editar(Request $request, $id)
    {
        $usuario = User::find($id);

        // Definir as regras de validação

        $rules = [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
        ];

        // Se o login do usuário for diferente do informado no request, adicione a regra de validação do email
        if ($usuario->login !== $request->login) {
            $rules['login'] = 'required|string|max:255|unique:usuarios,login';
        }

        // Se o email do usuário for diferente do informado no request, adicione a regra de validação do login
        if ($usuario->email !== $request->email) {
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
            return redirect()->route('usuariosView')
                ->with('msgf', $firstErrorMessage)
                ->withInput(); // Preserva os dados do formulário
        }

        $dados = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'login' => $request->login,
            'email' => $request->email,
            'ativo' => $request->ativo,
            'acesso' => $request->acesso,
        ];

        // Verifique se a senha foi fornecida no request
        if ($request->filled('password')) {
            $dados['password'] = Hash::make($request->password);
        }

        $usuario->update($dados);

        return redirect()->route('usuariosView')->with('msg', 'Usuário editado com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        return redirect()->route('usuariosView')->with('msg', 'Usuário excluido com sucesso!');
    }
}
