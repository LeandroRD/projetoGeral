<?php
namespace App\Controllers;

use App\Models\FornecedorModel;

class Fornecedores extends \CodeIgniter\Controller
{
    public function index()
    {
        echo view('fornecedores');
    }

    public function cadastrar()
    {
        $fornecedorModel = new FornecedorModel();
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
        ];
        $fornecedorModel->insert($data);
        return redirect()->to(site_url('fornecedores'))->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    public function listar()
    {
        $fornecedorModel = new FornecedorModel();
        $fornecedores = $fornecedorModel->findAll();
        return view('fornecedores_lista', ['fornecedores' => $fornecedores]);
    }

    public function editar($id)
    {
        $fornecedorModel = new FornecedorModel();
        $fornecedor = $fornecedorModel->find($id);
        if (!$fornecedor) {
            return redirect()->to(site_url('fornecedores/listar'))->with('error', 'Fornecedor não encontrado!');
        }
        return view('fornecedores_editar', ['fornecedor' => $fornecedor]);
    }

    public function atualizar($id)
    {
        $fornecedorModel = new FornecedorModel();
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
        ];
        $fornecedorModel->update($id, $data);
        return redirect()->to(site_url('fornecedores/listar'))->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function excluir($id)
    {
        $fornecedorModel = new FornecedorModel();
        $fornecedorModel->delete($id);
        return redirect()->to(site_url('fornecedores/listar'))->with('success', 'Fornecedor excluído com sucesso!');
    }
}
