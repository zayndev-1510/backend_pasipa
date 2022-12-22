<?php

namespace App\Http\Controllers\admin\services;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TblTransaksi;
use Illuminate\Support\Facades\DB;
class TransaksiServices extends Controller
{
    function loadDataTransaksiAdmin(){
        $data=DB::table("tbl_transaksi")->select("*")->get();
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
}
