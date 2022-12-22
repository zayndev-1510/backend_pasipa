/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
var rupiah = document.getElementById('rupiah');
var puangkembalian = document.getElementById("uangkembalian")
var uangbayar = 0;
var totalharga = 0;
var formatuangbayar = "";

const formatRupiahIdr = (money) => {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(money);
}
rupiah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    var tmpbayar = rupiah.value;
    var str = (tmpbayar.split(".", tmpbayar.length))
    if (tmpbayar.length == 1) {
        console.log(str[0])
        uangbayar = parseFloat(str[0]) - totalharga
        formatuangbayar = formatRupiahIdr(uangbayar);
        puangkembalian.innerText = formatuangbayar

    } else {
        var joins = str.join("")
        var substr = parseFloat(joins.substr(2, tmpbayar.length))
        uangbayar = substr - totalharga
        formatuangbayar = formatRupiahIdr(uangbayar);
        puangkembalian.innerText = formatuangbayar

    }



    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, 'Rp. ');

});
app.controller("homeController", function($scope, service) {

    var func = $scope;
    var service = service;
    func.container = false
    var produk = []
    var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
    var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
    var nomor_transaksi = null;


    func.DataTransaksi = () => {
        service.dataTransaksi(row => {
            func.transaksi = row.data
        })
    }
    func.DataTransaksi()


    func.detailTransaksi = (row) => {
        func.container = true
        func.nomor_transaksi = row.nomor_transaksi
        nomor_transaksi = row.nomor_transaksi;
        func.nomor_keranjang = row.nomor_keranjang
        func.nama_pembeli = row.pembeli.nama;
        var tgl = new Date(row.tgl)
        func.format_tgl = hari[tgl.getDay()] + " " + tgl.getDate() + " " + bulan[tgl.getMonth()] + " " + tgl.getFullYear()
        var obj = {
            nomor_keranjang: row.nomor_keranjang
        }

        func.total = row.total;
        totalharga = row.total;
        var totalproduk = 0;

        service.dataProduk(obj, respon => {
            func.produk = respon.data;
            produk = respon.data;
            produk = respon.data
            for (var i = 0; i < produk.length; i++) {
                totalproduk = totalproduk + produk[i].jumlah
            }
            func.jumlahproduk = totalproduk
        })
    }

    func.selesaiTransaksi = () => {
        let obj = {
            "transaksi": {
                nomor_transaksi: nomor_transaksi,
                status: 0,
            },
            "produk": produk

        }

        service.PerbaruiTransaksi(obj, row => {

            if (row.count > 0) {
                swal({
                    text: "Perbarui transaks berhasil",
                    icon: "success"
                })
                func.container = false
            } else {
                swal({
                    text: "Gagal",
                    icon: "error"
                })
            }
        })
    }
})