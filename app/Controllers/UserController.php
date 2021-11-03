<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends Controller{
    public function index(){
        session_start(['name'=>'SPM']);
        if(isset($_SESSION['usurol'])){
            $data['firstname'] = $_SESSION['usr_firstname'];
            $data['lastname'] = $_SESSION['usr_lastname'];
            $data['phone'] = $_SESSION['usr_phone'];
            $data['email'] = $_SESSION['usr_email'];
            $data['datid'] = $_SESSION['datid'];
            return view('Edit-user',$data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function update_user_controller(){
        session_start(['name'=>'SPM']);
        $datid = $_SESSION['datid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $ins = new UserModel();
        $res = $ins->update_user_model($datid, $firstname, $lastname, $phone, $email);
        return json_encode($res);
    }

    public function view_seller_data_controller(){

    }
    
}