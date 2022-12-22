/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    fun.aksi = false;

    fun.template = false;

    var datamasuk = [];
    var id_suplier = 0;

    var tab_nav = document.getElementsByClassName("tab-nav")

    tab_nav[1].style.backgroundColor = "white";
    tab_nav[1].style.color = "#AAA";
    fun.DataProdukMasuk = () => {
        var now = new Date();
        const month = (now.getMonth()) + 1;
        const year = now.getFullYear();
        const date = now.getDate();
        var tgl = year + "-" + month + "-" + date;
        service.ProdukMasuk(tgl, (row) => {
            fun.produkmasuk = row.data;
            fun.totalprodukmasuk = row.totalproduk;
            fun.totalstoklama = row.stoklama;
            fun.totalstokbaru = row.stokbaru;
            fun.totalhargaproduk = row.totalhargaproduk;
        })
    }


    fun.tabNavButton = (a, b) => {
        tab_nav[a].style.backgroundColor = " #d9e5f9";
        tab_nav[a].style.color = "#387be2";
        tab_nav[b].style.backgroundColor = "white";
        tab_nav[b].style.color = "#AAA";
        if (a == 1) {
            fun.template = true;
        } else {
            fun.template = false;
        }
        fun.DataProduk();
        fun.DataSuplier();


    }
    fun.DataProdukMasuk();


    fun.DataProduk = () => {

        service.DataProduk(row => {
            var dataproduk = [];
            for (let index = 0; index < row.length; index++) {
                const element = row[index];
                element.jumlah = 0;
                element.input = 0;
                dataproduk.push(element)
            }

            fun.dataproduk = dataproduk;

        })

    }

    fun.DataSuplier = () => {
        service.DataSuplier(row => {
            var data = row.data;
            for (var index = 0; index < data.length; index++) {
                var element = data[index]
                element.status = false;

            }
            fun.datasuplier = data;
        })
    }


    fun.tambahListProduk = (data) => {
        data.subtotal = data.jumlah * data.harga
        data.stokbaru = data.stok + data.jumlah;
        data.stoklama = data.stok;

        var totalproduk = 0;
        var totalharga = 0;
        if (datamasuk.length == 0) {
            datamasuk.push(data);
            var sum = 0;
            for (var index = 0; index < datamasuk.length; index++) {
                var element = datamasuk[index]
                element.input = 0;
                sum = sum + (data.jumlah + element.input)
                element.input = sum;
                totalproduk = totalproduk + element.jml;
                totalharga = totalharga + element.subtotal;
            }
            fun.produkmasuk = datamasuk;
            fun.totalharga = data.subtotal;
            fun.totalproduk = data.jml
        } else if (datamasuk.length > 0) {

            var duplicate = false;
            for (var index = 0; index < datamasuk.length; index++) {
                var element = datamasuk[index]

                if (element.id == data.id) {

                    element.input = data.jumlah;
                    duplicate = true;
                }
                totalproduk = totalproduk + element.input;
                totalharga = totalharga + element.subtotal;
            }


            if (!duplicate) {
                datamasuk.push(data)
                for (var index = 0; index < datamasuk.length; index++) {
                    var element = datamasuk[index]
                    if (element.input == 0) {
                        element.input = data.jumlah;
                    }
                    totalproduk = totalproduk + element.input;
                    totalharga = totalharga + element.subtotal;
                }

            }
            fun.totalproduk = totalproduk
            fun.totalharga = totalharga;

        }

    }

    fun.setUpSuplier = (row, a) => {
        let status = false;
        if (a == 0) {
            fun.nama_suplier = row.nama_suplier;
            fun.nomor_hp = row.nomor_hp;
            fun.email = row.email;
            fun.alamat = row.alamat;
            status = true

        } else {
            fun.nama_suplier = "Tidak Ada Data";
            fun.nomor_hp = "Tidak ada Data";
            fun.email = "Tidak ada Data";
            fun.alamat = "Tidak ada Data";
        }

        var data = fun.datasuplier;

        id_suplier = row.id;
        for (var index = 0; index < data.length; index++) {
            var element = data[index]
            if (element.id == id_suplier) {
                element.status = status
            }
        }
        fun.datasuplier = data;
    }
    fun.saveProdukMasuk = () => {

        if (datamasuk.length == 0) {
            swal({
                text: "Tambahkan Data Produk Dulu !",
                icon: "warning"
            })
            return
        }
        var dataprodukmasuk = [];
        var dataprodukupdate = [];
        var tglnow = new Date();
        for (var index = 0; index < datamasuk.length; index++) {
            const element = datamasuk[index]
            const tgl = tglnow.getFullYear() + "-" + (tglnow.getMonth() + 1) + "-" + tglnow.getDate();
            dataprodukmasuk.push({
                id_barang: element.id,
                id_suplier: id_suplier,
                jumlah: element.input,
                stok_lama: element.stoklama,
                tgl: tgl
            });
            dataprodukupdate.push({
                id: element.id,
                stok: element.stokbaru,
                tgl: tgl
            });
        }
        var obj = {
            "produkupdate": dataprodukupdate,
            "produkmasuk": dataprodukmasuk
        }
        service.SaveProdukMasuk(obj, (row) => {
            let count = row.count;
            if (count > 0) {
                swal({
                    text: "Penambahan data produk masuk berhasil",
                    icon: "success"
                });
                fun.DataProdukMasuk();
                fun.tabNavButton(0, 1)
                fun.template = false;
            } else {
                swal({
                    text: "Penambahan data produk masuk gagal"
                })
            }
        })
    }

});