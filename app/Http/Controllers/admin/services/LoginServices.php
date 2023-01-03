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

    public function SetCookie($id,$cookie_name){
        $cookie_value = $id;
        setcookie($cookie_name, $cookie_value, time() + (20 * 365 * 24 * 60 * 60), "/"); // 86400 = 1 day
    }

    function loginAdmin(Request $r){
       
       
        $username = $r->username;
        $sandi = $r->password;
        $datalogin = TblLogin::where("username", $username)->select()->first();
        if ($datalogin) {
            if ($datalogin->sandi == $sandi) {
                $id_pengguna=$datalogin->id_pengguna;
                $this->SetCookie($id_pengguna, "userid");
                echo json_encode([
                    "count" => 1,
                    "message" => "Login Success",
                    "type" => "Login",
                    "id_pengguna" => $id_pengguna . "&" . $this->generateRandomString(50),
                    "lvl"=>$datalogin->hak_akses, 
                       
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
