<?php 
namespace App\Models;
use CodeIgniter\Model;
use App\Models\MainModel;

class BuyerModel extends Model{
    public function read_cars_bycategory_model($categoryid){
        new MainModel();
        $con = MainModel::conectar();

        $query = ("SELECT * FROM vehiculo WHERE catid = ?");
        $res = $con->query($query,[$categoryid]);
        $datacar = $res->getResult();
        $table = '';

        
        foreach($datacar as $row){
            $query = ("SELECT * FROM datospersonales WHERE datid = ?");
            $res = $con->query($query,[$row->datid]);
            $dataseller = $res->getRow();

            if(isset($dataseller)){
                $table .= '
                    <tr>
                    <td>'.$row->vehmodelo.'</td>
                    <td>'.$row->vehmarca.'</td>
                    <td>'.$row->vehcolor.'</td>
                    <td>'.$row->vehestado.'</td>
                    <td>'.$row->vehprecio.'</td>
                    <td><a href="" onclick="event.preventDefault(); view_seller_data(\''.$dataseller->datnombre.'\',\''.$dataseller->datapellido.'\',\''.$dataseller->datelefono.'\');">Ver datos del vendedor</a></td>
                    </tr>
                ';
            }
        }

        $con->close();
        return $table;
    }

    public function read_cars_byprice_model($pricefrom, $priceuntil){
        new MainModel();
        $con = MainModel::conectar();

        $query = ("SELECT * FROM vehiculo WHERE vehprecio BETWEEN ? AND ?");
        $res = $con->query($query,[$pricefrom, $priceuntil]);
        $datacar = $res->getResult();
        $table = '';

        
        foreach($datacar as $row){
            $query = ("SELECT datelefono FROM datospersonales WHERE datid = ?");
            $res = $con->query($query,[$row->datid]);
            $dataseller = $res->getRow();

            if(isset($dataseller)){
                $table .= '
                    <tr>
                    <td>'.$row->vehmodelo.'</td>
                    <td>'.$row->vehmarca.'</td>
                    <td>'.$row->vehcolor.'</td>
                    <td>'.$row->vehestado.'</td>
                    <td>'.$row->vehprecio.'</td>
                    <td>'.$dataseller->datelefono.'</td>
                    </tr>
                ';
            }
        }

        $con->close();
        return $table;
    }
}