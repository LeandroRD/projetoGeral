<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Users extends BaseController
{
    //====================================================
    public function index()
    {    
        return view('usuarios');
    }

    public function cadastrar()
    {
        $usuarioModel = new UsuarioModel();
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
        ];
        $usuarioModel->insert($data);
        return redirect()->to(site_url('users'))->with('success', 'Usuário cadastrado com sucesso!');
    }
    //--------------------------------------------------------------------

    public function listar()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll();
        return view('usuarios_lista', ['usuarios' => $usuarios]);
    }

    public function editar($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->to(site_url('users/listar'))->with('error', 'Usuário não encontrado!');
        }
        return view('usuarios_editar', ['usuario' => $usuario]);
    }

    public function atualizar($id)
    {
        $usuarioModel = new UsuarioModel();
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
        ];
        if ($this->request->getPost('senha')) {
            $data['senha'] = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
        }
        $usuarioModel->update($id, $data);
        return redirect()->to(site_url('users/listar'))->with('success', 'Usuário atualizado com sucesso!');
    }

    public function excluir($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->delete($id);
        return redirect()->to(site_url('users/listar'))->with('success', 'Usuário excluído com sucesso!');
    }

}
