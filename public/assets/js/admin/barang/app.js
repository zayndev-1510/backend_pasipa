/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var barang = document.getElementsByClassName("barang");
    var id_barang = 0;
    var data_akademik;
    fun.aksi = false;

    fun.getDataBarang = () => {
        service.dataBarang(respon => {
            fun.barang = respon;
        })
    }
    fun.getDataBarang();

    fun.clearValue = () => {
        for (var i = 0; i < barang.length; i++) {
            barang[i].value = "";
        }
        fun.aksi = false
    }

    fun.tambahData = () => {
        fun.ket = "Tambah Barang";
        fun.clearValue();
    }

    fun.detailBarang = (row) => {
        fun.aksi = true
        id_barang = row.id;
        barang[0].value = row.nomor_barcode;
        barang[1].value = row.nama_barang
        barang[2].value = row.harga
        barang[3].value = row.stok
        barang[4].value = row.harga_jual
    }

    fun.saveBarang = () => {
        var obj = {
            nomor_barcode: barang[0].value,
            nama_barang: barang[1].value,
            harga: parseFloat(barang[2].value),
            stok: parseFloat(barang[3].value),
            harga_jual: parseFloat(barang[4].value)
        }
        service.createProduk(obj, (res) => {

            if (res.count > 0) {
                swal({
                    text: res.message,
                    icon: "success"
                })
                fun.getDataBarang();
                fun.clearValue()
            } else {
                swal({
                    text: res.message,
                    icon: "success"
                })
            }


        })
    }
    fun.updateBarang = () => {
        var obj = {
            id: id_barang,
            nomor_barcode: barang[0].value,
            nama_barang: barang[1].value,
            harga: parseFloat(barang[2].value),
            stok: parseFloat(barang[3].value),
            harga_jual: parseFloat(barang[4].value)
        }
        service.updateProduk(obj, (res) => {

            if (res.count > 0) {
                swal({
                    text: res.message,
                    icon: "success"
                })
                fun.getDataBarang();

                fun.clearValue()
            } else {
                swal({
                    text: res.message,
                    icon: "success"
                })
            }


        })

    }




});