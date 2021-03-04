<?php

namespace App\Models;

use CodeIgniter\Model;



class StocksModel extends Model
{
    protected $db;
    //==========================================
    public function __construct(){
        $this->db = db_connect();
    }
    //=====================================================
    public function get_all_families(){
        // retorna toda a familia
        return $this->query("SELECT * FROM stock_familias")->getResult('array');

    }
 }
