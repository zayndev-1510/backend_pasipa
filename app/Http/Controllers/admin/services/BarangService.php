<?php

namespace App\Http\Controllers\admin\services;

use App\Models\TblBarang;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BarangService extends Controller
{
    function loadDataBarang(){
        $data=DB::table("tbl_barang")->select()->get();
        echo json_encode($data);
    }

    function addDataBarang(Request $r){
        $insert=[
            "nama_barang"=>$r->nama_barang,
            "nomor_barcode"=>$r->nomor_barcode,
            "harga"=>$r->harga,
            "harga_jual"=>$r->harga_jual,
            "stok"=>$r->stok
        ];
        $x=TblBarang::create($insert);
        if($x){
          echo json_encode([
            "count"=>1
          ]);
        }else{
            echo json_encode([
                "count"=>0
              ]);
        }
    }

    function updateDataBarang(Request $r){
        $update=[
            "nama_barang"=>$r->nama_barang,
            "nomor_barcode"=>$r->nomor_barcode,
            "harga"=>$r->harga,
            "harga_jual"=>$r->harga_jual,
            "stok"=>$r->stok
        ];
        $id=$r->id;
        $x=TblBarang::where("id",$id)->update($update);
        if($x){
          echo json_encode([
            "count"=>1
          ]);
        }else{
            echo json_encode([
                "count"=>0
              ]);
        }
    }

    function deleteDataBarang($id){
        $x=TblBarang::where("id",$id)->delete();
        if($x){
            echo json_encode([
                "count"=>1
            ]);
        }else {
            echo json_encode([
                "count"=>0
            ]);
        }
    }

}
