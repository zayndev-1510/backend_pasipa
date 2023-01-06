<?php

namespace App\Http\Controllers\page;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Page extends Controller
{
 
    function Login(){

        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Dashboard"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.home",compact("data","datalogin"));
    
        }else{
            return view("login");
    
        }
        

    }

    function Home(){
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Dashboard"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.home",compact("data","datalogin"));
    
        }else{
            return view("login");
    
        }
    

    }

    function Barang(){

        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Barang"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.barang",compact("data","datalogin"));
        }else{
            return view("login");
        }
     

    }

    function RiwayatPembelian(){

       
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Riwayat Pembelian"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.riwayat",compact("data","datalogin"));
        }else{
            return view("login");
        }

    }

    function LaporanPembelian(){

      
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Laporan Pembelian"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.laporan_pembelian",compact("data","datalogin"));
        }else{
            return view("login");
        }

    }

    function LaporanPenjualan(){

       
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Laporan Penjualan"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.laporan_penjualan",compact("data","datalogin"));
        }else{
            return view("login");
        }

    }

    function RiwayatPenjualan(){

      
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Riawayat Penjualan"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.riwayat_penjualan",compact("data","datalogin"));
        }else{
            return view("login");
        }

    }

    

    function ProdukKeluar(){

        
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Produk Keluar"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.produk_keluar",compact("data","datalogin"));
        }else{
            return view("login");
        }

    }

    
    function ProdukMasuk(){
       
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Produk Masuk"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.produk_masuk",compact("data","datalogin"));
        }else{
            return view("login");
        }
    }


    function TransaksiMasuk(){
       
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Transaksi Masuk"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.transaksi_masuk",compact("data","datalogin"));
        }else{
            return view("login");
        }
    }

    function suplier(){
       
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Suplier"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.suplier",compact("data","datalogin"));
        }else{
            return view("login");
        }
    }

    function Transaksi(){
      
        if(isset($_COOKIE["userid"])){
            $id_pengguna = $_COOKIE["userid"];
            $data=[];
            $data=(object)[
                "keterangan"=>"Data Transaksi Keluar"
            ];
            $datalogin=DB::table('tbl_admin')->where("id",$id_pengguna)->select("*")->first();
            return view("admin.transaksi",compact("data","datalogin"));
        }else{
            return view("login");
        }
    }
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
