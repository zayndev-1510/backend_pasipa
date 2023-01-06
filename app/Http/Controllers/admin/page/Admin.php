<?php

namespace App\Http\Controllers\admin\page;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{
function Kasir(){
      
    if(isset($_COOKIE["userid"])){
        $id_pengguna = $_COOKIE["userid"];
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Kasir"
        ];
        $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
        return view("admin.kasir",compact("data","datalogin"));
    }else{
        return view("login");
    }
}
}
