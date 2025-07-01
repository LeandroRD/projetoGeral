<?php
namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
    protected $table = 'fornecedores';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'telefone'];
    public $timestamps = true;
}
