<?php

namespace App\Http\Controllers\admin\services;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LaporanPembelian extends Controller
{
    public function CetakLaporanPembelian(Request $r){
        return view("admin.cetak_laporan_pembelian");

    }
    public function CetakLaporanPenjualan(Request $r){
        return view("admin.cetak_laporan_penjualan");

    }
}
