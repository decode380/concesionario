<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\MainModel;

class SellerModel extends Model{
    public function read_car_seller_model($datid){
        new MainModel();
        $con = MainModel::conectar();

        $rescat = self::read_categories();

        $query = ("SELECT * FROM vehiculo WHERE datid = ?");
        $res = $con->query($query,[$datid]);
        $data = $res->getResult();

        $table = '';
        foreach($data as $row){
            $table .= '
                <tr>
                <td>'.$row->vehplaca.'</td>
                <td>'.$row->vehmodelo.'</td>
                <td>'.$rescat[$row->catid-1].'</td>
                <td>'.$row->vehmarca.'</td>
                <td>'.$row->vehcolor.'</td>
                <td>'.$row->vehestado.'</td>
                <td>'.$row->vehprecio.'</td>
                </tr>
            ';
        }
        $con->close();
        return $table;
    }

    public function read_categories(){
        new MainModel();
        $con = MainModel::conectar();

        $query = ("SELECT * FROM categoria");
        $res = $con->query($query);
        $data = $res->getResult();
        $rescat = array();

        foreach($data as $index => $value){
            $rescat[$index] = $value->catipo;
        }

        $con->close();
        return $rescat;
    }

    public function validate_car_repeat_model($vehplaca){
        new MainModel();
        $con = MainModel::conectar();
        $query = ("SELECT * FROM vehiculo WHERE vehplaca = ?");
        $res = $con->query($query,[$vehplaca]);
        $data = $res->getRow();
        
        $con->close();
        if(isset($data)){
            return true;
        } else {
            return false;
        }
    }

    public function insert_car_model($id,$model,$category,$make,$color,$price, $type){
        new MainModel();
        $con = MainModel::conectar();

        $query = ("SELECT * FROM categoria WHERE catipo = ?");
        $res = $con->query($query,[$category]);
        $data = $res->getRow();
        $categoryid = $data->catid;

        session_start(['name'=>'SPM']);
        $datid = $_SESSION['datid'];

        $query = ("INSERT INTO vehiculo(vehplaca,datid,catid,vehmodelo,vehmarca,vehestado,vehprecio,vehcolor) VALUES (?,?,?,?,?,?,?,?)");
        $res = $con->query($query,[$id, $datid, $categoryid, $model, $make, $type, $price, $color]);

        if($con->affectedRows() == 1){
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }

}