<?php

use App\Http\Controllers\admin\services\LaporanPembelian;
use App\Http\Controllers\page\Page;
use Illuminate\Support\Facades\Route;

route::get("/",[PageHome::class,"index"]);
route::get("/daftar",[PageHome::class,"daftar"]);
route::get("/cekdaftar",[PageHome::class,"cekhasil"]);
route::get("/detail-kegiatan",[PageHome::class,"detailKegiatan"]);
route::get("/profil-sekolah",[PageHome::class,"profil"]);
route::get("/tata-tertib",[PageHome::class,"tata_tertib"]);
route::get("/kegiatan-sekolah",[PageHome::class,"kegiatan_sekolah"]);


Route::prefix('admin')->group(function () {

    route::get("dashboard/produk",[Page::class,"Barang"]);
    route::get("dashboard/transaksi/today",[Page::class,"Transaksi"]);
    route::get("dashboard/kasir", [Page::class, "Kasir"]);
    route::get("dashboard/suplier", [Page::class, "Suplier"]);
    route::get("dashboard/produk-keluar", [Page::class, "ProdukKeluar"]);
    route::get("dashboard/produk-masuk", [Page::class, "ProdukMasuk"]);
    route::get("dashboard/riwayat-pembelian", [Page::class, "RiwayatPembelian"]);
    route::get("dashboard/riwayat-penjualan", [Page::class, "RiwayatPenjualan"]);
    route::get("dashboard/laporan-pembelian", [Page::class, "LaporanPembelian"]);
    route::get("dashboard/laporan-penjualan", [Page::class, "LaporanPenjualan"]);
    route::get("dashboard", [Page::class, "Home"]);

    // Cetak Laporan Pembelian Dan Penjualan

    route::get("cetak-laporan-pembelian", [LaporanPembelian::class, "CetakLaporanPembelian"]);
    route::get("cetak-laporan-penjualan", [LaporanPembelian::class, "CetakLaporanPenjualan"]);

});


?>
