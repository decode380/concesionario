<?php 
namespace App\Models;
use CodeIgniter\Model;

class MainModel extends Model{
    public static function conectar(){
        $db = db_connect();
        return $db;
    }

}