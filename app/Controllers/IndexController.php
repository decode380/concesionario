<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\SellerModel;
use App\Models\BuyerModel;

class IndexController extends Controller{
    public function index(){
        session_start(['name'=>'SPM']);
        if(isset($_SESSION['usurol'])){
            $ins = new SellerModel();
            $datid = $_SESSION['datid'];

            $table = $ins->read_car_seller_model($datid);
            $data['table'] = $table;

            $categories = $ins->read_categories();
            $data['categories'] = $categories;

            if($_SESSION['currentrol'] == 1){
                return view('Index-seller', $data);
            } else {
                return view('Index-buyer', $data);
            }
        } else {
            return redirect()->to(base_url());
        }
    }

    public function validate_car_repeat_controller(){
        $id = $_POST['id'];
        $ins = new SellerModel();
        $res = $ins->validate_car_repeat_model($id);
        return json_encode($res);
    }

    public function insert_car_controller(){
        $id = $_POST['id'];
        $model = $_POST['model'];
        $category = $_POST['category'];
        $make = $_POST['make'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $type = $_POST['type'];

        $ins = new SellerModel();
        $res = $ins->insert_car_model($id,$model,$category,$make,$color,$price, $type);
        
        return json_encode($res);
    }

    public function read_cars_bycategory_controller(){
        $ins = new BuyerModel();
        $categoryid = $_POST['categoryid'];

        $res = $ins->read_cars_bycategory_model($categoryid);
        return json_encode($res);
    }

    public function read_cars_price_controller(){
        $ins = new BuyerModel();
        $pricefrom = $_POST['pricefrom'];
        $priceuntil = $_POST['priceuntil'];

        $res = $ins->read_cars_byprice_model($pricefrom, $priceuntil);
        return json_encode($res);
    }
}