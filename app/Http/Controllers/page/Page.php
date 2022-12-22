<?php

namespace App\Http\Controllers\page;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Page extends Controller
{

    function Home(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Dashboard"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.home",compact("data","datalogin"));

    }

    function Barang(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Barang"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.barang",compact("data","datalogin"));

    }

    function RiwayatPembelian(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Riwayat Pemebelian"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.riwayat",compact("data","datalogin"));

    }

    function LaporanPembelian(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Laporan Pembelian"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.laporan_pembelian",compact("data","datalogin"));

    }

    function LaporanPenjualan(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Laporan Penjualan"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.laporan_penjualan",compact("data","datalogin"));

    }

    function RiwayatPenjualan(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Riwayat Penjualan"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.riwayat_penjualan",compact("data","datalogin"));

    }

    

    function ProdukKeluar(){

        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Produk Keluar"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.produk_keluar",compact("data","datalogin"));

    }

    
    function ProdukMasuk(){
        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Produk Masuk"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.produk_masuk",compact("data","datalogin"));
    }


    function TransaksiMasuk(){
        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Produk Masuk"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.transaksi_masuk",compact("data","datalogin"));
    }

    function suplier(){
        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Suplier"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.suplier",compact("data","datalogin"));
    }

    function Transaksi(){
        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Transaksi"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.transaksi",compact("data","datalogin"));
    }
    function Kasir(){
        if(isset($_COOKIE["username"])){
        }
        $username="andi15";
        $data=[];
        $data=(object)[
            "keterangan"=>"Data Kasir"
        ];
        $datalogin=DB::table('tbl_admin')->where("username",$username)->select("*")->first();
        $datalogin->foto="default.png";
        return view("admin.kasir",compact("data","datalogin"));
    }
}
