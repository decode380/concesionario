<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\MainModel;

class LoginModel extends Model{
    public function val_login_model($usr, $pass){
        new mainModel();
        $con = mainModel::conectar();
        $query = ("SELECT * FROM usuario WHERE usulogin = ?");
        $res = $con->query($query,[$usr]);
        $data = $res->getRow();

        if(isset($data)){
            if($data->usupassword == $pass){
                $con->close();
                return true;
            }
        }
        $con->close();
        return false;
    }
}