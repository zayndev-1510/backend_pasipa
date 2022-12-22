<?php

namespace App\Http\Controllers\user\services;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangServicesUser extends Controller
{
    function dataBarangUser(Request $r){
        $nomor_barcode=$r->nomor_barcode;
        $data=DB::table("tbl_barang")->where("nomor_barcode",$nomor_barcode)->
        select("*")->first();
        if($data){
            echo json_encode([
                "count"=>1,
                "message"=>"All Record show",
                "type"=>"Record",
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "count"=>0,
                "message"=>"Empty Record",
                "type"=>"Record"
            ]);
        }
    }

    function cekBarang($nomor_barcode){
        $data=DB::table("tbl_barang")->where("nomor_barcode",$nomor_barcode)->select("*")->get();
        if($data){
            echo json_encode([
                "count"=>1,
                "message"=>"data has found ",
                "type"=>"Record",
                "data"=>$data,
            ]);
        }else{
            echo json_encode([
                "count"=>0,
                "message"=>"data not found",
                "type"=>"Record",
                "data"=>[]
            ]);
        }
    }
}
