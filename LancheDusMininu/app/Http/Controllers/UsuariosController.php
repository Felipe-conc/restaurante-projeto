<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        Usuarios::create([
            'nome_usuario' => $request->nome_usuario,
            'nome' => $request->nome,
            'senha' => Hash::make($request->senha)
        ]);

        return redirect('/usuarios')->with('success', 'Usuário cadastrado!');
    }

    public function edit($id)
    {
        $usuario = Usuarios::find($id);
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        Usuarios::updateUser($id, [
            'nome_usuario' => $request->nome_usuario,
            'nome' => $request->nome,
            'senha' => Hash::make($request->senha)
        ]);

        return redirect('/usuarios')->with('success', 'Usuário atualizado!');
    }

    public function destroy($id)
    {
        Usuarios::deleteUser($id);
        return redirect('/usuarios')->with('success', 'Usuário deletado!');
    }
}
