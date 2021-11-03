<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\MainModel;

class UserModel extends Model{
    public function update_user_model($datid, $firstname, $lastname, $phone, $email){
        $con = MainModel::conectar();
        $query = ("UPDATE datospersonales SET datnombre=?, datapellido=?, datelefono=?, datcorreo=? WHERE datid = ?");
        $res = $con->query($query, [$firstname, $lastname, $phone, $email, $datid]);

        if($con->affectedRows() == 1){
            session_start(['name'=>'SPM']);
            $_SESSION['usr_firstname']= $firstname;
            $_SESSION['usr_lastname']= $lastname;
            $_SESSION['usr_phone']= $phone;
            $_SESSION['usr_email']= $email;
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }

    public function view_seller_data_model($carid){

    }
}