<?php

namespace App\Http\Controllers\kasir\api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AkunKasir extends Controller
{
    public function profilAkun(Request $r){
        $monthname=[
            "Januari","Februari","Maret","April","Mei","Jun","Juli","Agustus","September","Oktober","November","Desember"
        ];
        $id_pengguna=$r->id_pengguna;
        $x=DB::table("tbl_kasir")->where("id",$id_pengguna)->select("*")->get();
        
        $datalogin = DB::table("tbl_login")->where("id_pengguna", $id_pengguna)->select("*")->first();
        if(count($x)>0){
            $data=$x[0];
            $data->username = $datalogin->username;
            $tgl=explode("-",$data->tgl_lahir);
            $data->tahun=$tgl[0];
            $data->month=$monthname[$tgl[1]-1];
            $data->date=$tgl[2];
          
            try {
               echo json_encode(
                    [
                        "val"=>1,
                        "data"=>$data
                    ]
                    );
            } catch (Exception $e) {
                echo json_encode([
                    "val"=>999,
                    "message"=>"You have error in ".$e->getMessage()
                ]);
            }
        }
        else{
            echo json_encode([
                "val"=>0,
                "data"=>[]
            ]);
        }

    }
}
