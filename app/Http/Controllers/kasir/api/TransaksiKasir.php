<?php

namespace App\Http\Controllers\kasir\api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\DB;
class TransaksiKasir extends RoutingController
{
    function dataTransaksiToday($id_kasir){
        $monthname=[
            "Januari","Februari","Maret","April","Mei","Jun","Juli","Agustus","Septembe4r","Oktober","November","Desember"
        ];
        $data=DB::table("tbl_transaksi")->where("kasir",$id_kasir)->orderByDesc("tgl")
        ->select("*")->get();
        $dataproduk=DB::table("tbl_keranjang")->
        join("tbl_barang","tbl_barang.id","=","tbl_keranjang.id_barang")
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
                $value->kasir = (int) $value->kasir;
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

    function dataTransaksiUser($nomor_transaksi){
        $monthname=[
            "Januari","Februari","Maret","April","Mei","Jun","Juli","Agustus","Septembe4r","Oktober","November","Desember"
        ];
        $data = DB::table("tbl_transaksi")->where("nomor_transaksi", $nomor_transaksi)
            ->select("*")->first();
        $dataproduk=DB::table("tbl_keranjang")->
        join("tbl_barang","tbl_barang.id","=","tbl_keranjang.id_barang")
        ->select("tbl_barang.nama_barang","tbl_keranjang.jumlah","tbl_keranjang.nomor_keranjang",
        "tbl_keranjang.harga","tbl_keranjang.tgl","tbl_keranjang.id_barang"
        )->get();

        $jumlah_produk_total=0;
        foreach ($dataproduk as $key => $value) {
            $jumlah_produk_total=$jumlah_produk_total+$value->jumlah;
        };

        if($data !=null){
            $value = $data;
            $tgl=explode("-",$value->tgl);
            $value->tahun=$tgl[0];
            $value->month=$monthname[$tgl[1]-1];
            $value->date=$tgl[2];
            $value->produk=[];
            $value->format = (int) $tgl[2]. " " .$value->month ." " .$tgl[0];
            $value->kasir = (int) $value->kasir;
            foreach ($dataproduk as $key => $produk) {
                if($value->nomor_keranjang==$produk->nomor_keranjang){
                    $value->produk[]=$produk;
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
