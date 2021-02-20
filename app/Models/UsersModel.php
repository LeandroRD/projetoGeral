<?php

namespace App\Models;

use CodeIgniter\Model;



class UsersModel extends Model
{   //Inicio da variavel conectada na BD
    protected $db;

    public function __construct(){
        $this->db = db_connect();
    }
        public function teste(){
            
            $results = $this->db->query("SELECT * FROM users")->getResultArray();
            echo $results[0]['username'].'->'.$results[2]['passwrd'];
            exit();
        }
}