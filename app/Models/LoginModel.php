<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\MainModel;

class LoginModel extends Model{
    public function val_login_model($usr, $pass){
        new MainModel();
        $con = MainModel::conectar();
        $query = ("SELECT * FROM usuario WHERE usulogin = ?");
        $res = $con->query($query,[$usr]);
        $data = $res->getRow();

        if(isset($data)){
            if($data->usupassword == $pass){
                $usuid = $data->usuid;
                $query = ("SELECT * FROM usuario_rol WHERE usuid = ?");
                $res = $con->query($query,[$usuid]);
                $data = $res->getRow();
                session_start(['name'=>'SPM']);
                $_SESSION['usurol']= $data->rolid;
                $_SESSION['currentrol'] = $_SESSION['usurol'] == 3 ? 1 : $_SESSION['usurol'];

                $query = ("SELECT * FROM datospersonales WHERE usuid = ?");
                $res = $con->query($query,[$usuid]);
                $data = $res->getRow();
                $_SESSION['usr_firstname']= $data->datnombre;
                $_SESSION['usr_lastname']= $data->datapellido;
                $_SESSION['usr_phone']= $data->datelefono;
                $_SESSION['usr_email']= $data->datcorreo;
                $_SESSION['datid']= $data->datid;

                $con->close();
                return true;
            }
        }
        $con->close();
        return false;
    }
}