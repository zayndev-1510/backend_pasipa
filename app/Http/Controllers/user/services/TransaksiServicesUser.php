<?php

namespace App\Http\Controllers\user\services;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiServicesUser extends Controller
{

    function transaksiToday(){
        $tgl=date("Y-m-d");
        $data=DB::table("tbl_transaksi")->where("tgl",$tgl)->select("*")->get();


        if($data){
            echo json_encode([
                "count"=>1,
                "message"=>"Record Transaction today",
                "type"=>"Record",
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "count"=>0,
                "message"=>"Empty Record",
                "type"=>"Record",
                "data"=>[]
            ]);
        }
    }

    function transaksiMonth($year,$month,$id_pengguna){
        $monthname=[
            "Januari","Februari","Maret","April","Mei","Jun","Juli","Agustus","Septembe4r","Oktober","November","Desember"
        ];
        $data=DB::table("tbl_transaksi")->whereYear("tgl",$year)->whereMonth("tgl",$month)->where("id_pengguna",$id_pengguna)->orderBy("tgl","DESC")
        ->select("*")->get();
        $dataproduk=DB::table("tbl_keranjang")->whereYear("tgl",$year)->
        join("tbl_barang","tbl_barang.id","=","tbl_keranjang.id_barang")->
        whereMonth("tgl",$month)->where("id_pengguna",$id_pengguna)
        ->select("tbl_barang.nama_barang","tbl_keranjang.jumlah","tbl_keranjang.nomor_keranjang",
        "tbl_keranjang.harga","tbl_keranjang.tgl","tbl_keranjang.id_barang"
        )->get();

        $jumlah_produk_total=0;
        foreach ($dataproduk as $key => $value) {
            $jumlah_produk_total=$jumlah_produk_total+$value->jumlah;
        };

        if(count($data)>0){
            foreach ($data as $key => $value) {
                $tgl=explode("-",$value->tgl);
                $value->tahun=$tgl[0];
                $value->month=$monthname[$tgl[1]-1];
                $value->date=$tgl[2];
                $value->produk=[];
                foreach ($dataproduk as $key => $produk) {
                    if($value->nomor_keranjang==$produk->nomor_keranjang){
                        $value->produk[]=$produk;
                    }
                }
            }
            echo json_encode([
                "count"=>1,
                "message"=>"Record Transaction month",
                "type"=>"Record",
                "data"=>$data,
                "jumlah_total"=>$jumlah_produk_total,

            ]);
        }else{
            echo json_encode([
                "count"=>0,
                "message"=>"Empty Record",
                "type"=>"Record",
                "data"=>[]
            ]);
        }

    }
}
