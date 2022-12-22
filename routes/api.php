<?php
use App\Http\Controllers\admin\services\BarangService;
use App\Http\Controllers\admin\services\LoginServices;
use App\Http\Controllers\admin\services\RegistrasiServices;
use App\Http\Controllers\kasir\api\AkunKasir;
use App\Http\Controllers\kasir\api\TransaksiKasir;
use App\Http\Controllers\plugin\uploadFiles;
use App\Http\Controllers\user\services\BarangServicesUser;
use App\Http\Controllers\user\services\KeranjangServiceUser;
use App\Http\Controllers\user\services\TransaksiServicesUser;
use Illuminate\Support\Facades\Route;


route::prefix("admin")->group(function(){
    route::get("loadDataBarang",[BarangService::class,"loadDataBarang"]);
    Route::post('uploadfotokasir/{nama}',[uploadFiles::class,"uploadFotoKasir"]);
});

route::prefix("kasir")->group(function(){
    route::get('dataTransaksiToday/{id_kasir}',[TransaksiKasir::class,"dataTransaksiToday"]);
    route::get('dataTransaksiUser/{nomor_transaksi}',[TransaksiKasir::class,"dataTransaksiUser"]);
    route::post('profilkasir',[AkunKasir::class,"profilAkun"]);
    
});



route::prefix("user")->group(function(){

    route::get("tes",function(){
        echo json_encode("Hello");
    });
    // user melakukan registrasi,login dan mamanejem akun
    route::post("cek_akun",[RegistrasiServices::class,"cekAkun"]);
    route::post("login_akun",[LoginServices::class,"loginAkun"]);
    route::get("akun_pengguna/{id}",[RegistrasiServices::class,"akunPengguna"]);
    route::post("data_barang_user",[BarangServicesUser::class,"dataBarangUser"]);



    // check data barang tersedia yg dipindahkan di keranjang

    route::get("cek_barang_user/{a}",[BarangServicesUser::class,"cekBarang"]);


    // User menambahkan barang ke keranjang belanja
    route::post("add_keranjang_user",[KeranjangServiceUser::class,"addKeranjangUser"]);
    route::get("hapus_keranjang_user/{id}",[KeranjangServiceUser::class,"hapusKeranjangBelanja"]);
    route::get("data_keranjang_user/{x}/{y}/{z}",[KeranjangServiceUser::class,"dataKeranjang"]);
    route::post("update_keranjang_user",[KeranjangServiceUser::class,"updateKeranjang"]);


    //Manajemen transaksi user di halaman dashboard

    route::get("data_transaksi_user_today",[TransaksiServicesUser::class,"transaksiToday"]);
    route::get("data_transaksi_user_month/{year}/{month}/{id_pengguna}",[TransaksiServicesUser::class,"transaksiMonth"]);

});
