<?php

namespace App\Http\Controllers\user\services;

use App\Models\admin\TblKeranjang;
use App\Models\admin\TblTransaksi;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KeranjangServiceUser extends Controller
{
    function dataKeranjang($status,$id_pengguna,$nomor_keranjang){
        $data=DB::table("tbl_keranjang")->
        join("tbl_barang","tbl_barang.id","=","tbl_keranjang.id_barang")->
        where("status",$status)->
        where("id_pengguna",$id_pengguna)->where("nomor_keranjang",$nomor_keranjang)->
        select("tbl_barang.nama_barang","tbl_keranjang.tgl","tbl_keranjang.harga","tbl_keranjang.jumlah",
        "tbl_keranjang.nomor_keranjang","tbl_keranjang.id_barang","tbl_keranjang.id_pengguna","tbl_keranjang.id as id_keranjang",
        "tbl_keranjang.status"
        )->get();
        if(count($data)>0){
            $monthname=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            $tgl=explode("-",$data[0]->tgl);
            $total_produk=0;
            $total_harga=0;
            $nomor_keranjang=null;
            foreach ($data as $key => $value) {
                    $total_harga=$total_harga+($value->harga*$value->jumlah);
                    $total_produk=$total_produk+$value->jumlah;
                    $nomor_keranjang=$value->nomor_keranjang;
            }
            $format_tgl=$tgl[2]." ".$monthname[$tgl[1]-1]." ".$tgl[0];
            echo json_encode([
                "count"=>1,
                "message"=>"Record Shopping Card found",
                "type"=>"Record",
                "data"=>$data,
                "nomor_keranjang"=>$nomor_keranjang,
                "format_tgl"=>$format_tgl,
                "total_harga"=>$total_harga,
                "total_produk"=>$total_produk
            ]);
        }
        else{
            echo json_encode([
                "count"=>1,
                "message"=>"Empty Record",
                "type"=>"Record",
                "data"=>[]
            ]);
        }
    }
    function addKeranjangUser(Request $r){
        $id_pengguna=$r->id_pengguna;
        $id_barang=$r->id_barang;
        $jumlah=$r->jumlah;
        $harga=$r->harga;
        $nomor_keranjang=$r->nomor_keranjang;
        $data=[
            "id_pengguna"=>$id_pengguna,"id_barang"=>$id_barang,
            "jumlah"=>$jumlah,"harga"=>$harga,"tgl"=>date("Y-m-d"),
            "status"=>1,"nomor_keranjang"=>$nomor_keranjang
        ];

        $x=TblKeranjang::create($data);
        if($x){
            $databarang = DB::table("tbl_barang")->where("id", $x->id_barang)->select("nama_barang")->first();
            $databarang->jumlah = $x->jumlah;
            $databarang->harga = $x->harga;
            $databarang->id_keranjang = $x->id;
            $databarang->id_pengguna = $x->id_pengguna;
            $databarang->tgl = $x->tgl;
            $databarang->status = $x->status;
            echo json_encode([
                "count"=>1,
                "message"=>"Shopping Card Has Been Created",
                "type"=>"Created",
                "data"=>$databarang
            ]);
        }
        else{
            echo json_encode([
                "count"=>0,
                "message"=>"Shopping Card failed To Created",
                "type"=>"Created",
            ]);
        }
    }

    function updateKeranjang(Request $r){
        $data=$r->data;
        $arr=json_decode($data,false);
        $query=TblKeranjang::query();
        $nomor_keranjang=null;
        $id_pengguna=null;
        foreach ($arr as $key => $value) {
            $nomor_keranjang=$value->nomor_keranjang;
            $id_pengguna=$value->id_pengguna;
            $update =['jumlah'=>$value->jumlah,"status"=>0];
            DB::table('tbl_keranjang')->where("id_barang",$value->id_barang)->update($update);
        }

        TblTransaksi::create(
            [
                "nomor_transaksi"=>$r->nomor_transaksi,
                "total"=>$r->total,
                "nomor_keranjang"=>$nomor_keranjang,
                "tgl"=>date("Y-m-d"),
                "id_pengguna"=>$id_pengguna,
                "kasir"=>"Belum dilayani",
                "jumlah"=>$r->jumlah
            ]
            );


        if($query){
            echo json_encode([
                "count"=>1,
                "message"=>"Shopping Card Has Been Update",
                "type"=>"Update",
            ]);
        }else{
            echo json_encode([
                "count"=>1,
                "message"=>"Shopping Card Has Been Update",
                "type"=>"Deleted",
            ]);
        }

    }

    function hapusKeranjangBelanja($id){
        $x=TblKeranjang::where("nomor_keranjang",$id)->delete();
        if($x){
            echo json_encode([
                "count"=>1,
                "message"=>"Shopping Card Has Been Deleted",
                "type"=>"Deleted",
            ]);
        }else{
            echo json_encode([
                "count"=>0,
                "message"=>"Shopping Card Failed to Delete",
                "type"=>"Delete",
            ]);
        }
    }
}
