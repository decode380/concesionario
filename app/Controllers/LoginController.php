<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class LoginController extends Controller{
    public function index(){
        session_start(['name'=>'SPM']);
        if(!isset($_SESSION['usurol'])){
            return view('Login');
        } else {
            return redirect()->to(base_url('index'));
        }
    }

    public function val_login_controller(){
        $ins = new LoginModel();
        $usr = $_POST['usr'];
        $pass = $_POST['pass'];

        $res = $ins->val_login_model($usr, $pass);
        return json_encode($res);
    }

    public function switch_rol_controller(){
        session_start(['name'=>'SPM']);
        if($_SESSION['currentrol'] == 1){
            $_SESSION['currentrol'] = 2;
        } else {
            $_SESSION['currentrol'] = 1;
        }
        return redirect()->to(base_url('index'));
    }

    public function logout_controller(){
        session_start(['name' => 'SPM']);
        session_unset();
        session_destroy();
        return json_encode(true);
    }
}