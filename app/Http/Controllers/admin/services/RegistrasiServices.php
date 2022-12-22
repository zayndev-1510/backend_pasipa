<?php

namespace App\Http\Controllers\admin\services;

use App\Models\admin\TblLogin;
use App\Models\admin\TblRegistrasi;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class RegistrasiServices extends Controller
{
    function cekAkun(Request $r)
    {
        $cek = DB::table('tbl_login')->where("username", $r->username)->select()->get();
        if (count($cek) == 0) {
            $y = $this->daftarAkun($r);
            if ($y) {
                $id_pengguna = $y->id_register;
                $sandi =($r->sandi);
                $DATA_LOGIN = [
                    "username" => $r->username, "sandi" => $sandi,
                    "hak_akses" => 2, "tgl_buat" => date("Y-m-d"), "id_pengguna" => $id_pengguna
                ];
                $x = TblLogin::create($DATA_LOGIN);
                if ($x) {
                    echo json_encode([
                        "count" => 1,
                        "message" => "Registrasi Account Success",
                        "type" => "Login Record Has Created"
                    ]);
                } else {
                    echo json_encode([
                        "count" => 0,
                        "message" => "Registrasi Account Failed",
                        "type" => "Login Record Has Not Created"
                    ]);
                }
            }
            else{
                echo json_encode([
                    "count"=>0,
                    "message"=>"Registrasi Account Failed",
                    "type"=>"Registratsi Record Can't Created"
                ]);
            }
        } else {
            echo json_encode([
                "count" => 2,
                "message"=>"Your Record Has Duplicated",
                "type"=>"Duplicated"
            ]);
        }
    }

    function daftarAkun(Request $r)
    {

        $data = [
            "email" => $r->email,
            "nama" => $r->nama, "alamat" => $r->alamat,
            "nomor_hp" => $r->nomor_hp, "foto" => $r->foto
        ];
        $x = TblRegistrasi::create($data);
        return $x;
    }

    function akunPengguna($id_pengguna)
    {
        $datapengguna = TblRegistrasi::where("id_register", $id_pengguna)->select("*")->first();
        $datalogin=TblLogin::where("id_pengguna",$id_pengguna)->select("username","sandi")->first();

        if ($datapengguna) {
            $datapengguna->username=$datalogin->username;
            echo json_encode([
                "count" => 1,
                "message" => "Record user found",
                "type" => "Record",
                "data"=>$datapengguna
            ]);
        } else {
            echo json_encode([
                "count" => 0,
                "message" => "property non object",
                "type" => "property",

            ]);
        }
    }

}
