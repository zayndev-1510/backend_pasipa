<?php

namespace App\Http\Controllers\admin\services;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\admin\TblLogin;
use App\Models\admin\TblRegistrasi;
use Illuminate\Support\Facades\Crypt;

class LoginServices extends Controller
{
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function loginAkun(Request $r)
    {
        $username = $r->username;
        $sandi = $r->sandi;
        $datalogin = TblLogin::where("username", $r->username)->select()->first();
        if ($datalogin) {
            if ($datalogin->sandi == $sandi) {
                echo json_encode([
                    "count" => 1,
                    "message" => "Login Success",
                    "type" => "Login",
                    "id_pengguna" => $datalogin->id_pengguna . "&" . $this->generateRandomString(50),
                    "lvl"=>$datalogin->hak_akses
                ]);
            } else {
                echo json_encode([
                    "count" => 0,
                    "message" => "Login Failed Password Incorrect",
                    "type" => "Login"
                ]);
            }
        } else {
            echo json_encode([
                "count" => 0,
                "message" => "Login incorrect",
                "type" => "object"
            ]);
        }
    }


}
