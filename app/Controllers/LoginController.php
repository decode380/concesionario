<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class LoginController extends Controller{
    public function index(){
        return view('Login');
    }

    public function val_login_controller(){
        $ins = new LoginModel();
        $usr = $_POST['usr'];
        $pass = $_POST['pass'];

        $res = $ins->val_login_model($usr, $pass);
        return json_encode($res);
    }
}