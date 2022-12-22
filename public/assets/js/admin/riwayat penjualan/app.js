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
    var tab_nav = document.getElementsByClassName("tab-nav")
    var content_tab = document.getElementsByClassName("content-tab")
    var startmonth = document.getElementById("startmonth")
    var endmonth = document.getElementById("endmonth")
    var startyear = document.getElementById("startyear")
    var endyear = document.getElementById("endyear")

    fun.filterData = () => {
        if (startmonth.value.length == 0) {
            swal({
                text: "Masukan awal tanggal",
                icon: "warning"
            })
            return
        } else if (endmonth.value.length == 0) {
            swal({
                text: "Masukan akhir tanggal",
                icon: "warning"
            })
            return
        }
        const obj = {
            startmonth: startmonth.value,
            endmonth: endmonth.value,
            aksi: 1
        }
        service.ProdukMasukFilterMonth(obj, row => {
            fun.lengthproduk = row.data.length;
            var len = row.data.length
            if (len == 0) {
                fun.totalprodukmasuk = 0;
                fun.totalstoklama = 0;
                fun.totalstokbaru = 0;
                fun.totalhargaproduk = 0;
                return
            }
            fun.produkmasukbulanan = row.data;
            fun.totalprodukmasuk = row.totalproduk;
            fun.totalstoklama = row.stoklama;
            fun.totalstokbaru = row.stokbaru;
            fun.totalhargaproduk = row.totalhargaproduk;
        })

    }
    fun.filterDataTahunan = () => {
        if (startyear.value.length == 0) {
            swal({
                text: "Masukan Awal Tahunan",
                icon: "warning"
            })
            return
        } else if (endyear.value.length == 0) {
            swal({
                text: "Masukan Akhir Tahunan",
                icon: "warning"
            })
            return
        }
        const obj = {
            startyear: startyear.value,
            endyear: endyear.value,
            aksi: 2
        }
        service.ProdukMasukFilterTahunan(obj, row => {
            fun.lengthproduk = row.data.length;
            var len = row.data.length
            if (len == 0) {
                fun.totalprodukmasuk = 0;
                fun.totalstoklama = 0;
                fun.totalstokbaru = 0;
                fun.totalhargaproduk = 0;
                return
            }
            fun.produkmasuktahunan = row.data;
            fun.totalprodukmasuk = row.totalproduk;
            fun.totalstoklama = row.stoklama;
            fun.totalstokbaru = row.stokbaru;
            fun.totalhargaproduk = row.totalhargaproduk;
        })
    }




    for (var i = 1; i < tab_nav.length; i++) {
        tab_nav[i].style.backgroundColor = "white";
        tab_nav[i].style.color = "#AAA";
        content_tab[i].style.display = "none"
    }

    fun.DataProdukMasuk = () => {
        const obj = "all";
        service.ProdukMasuk(obj, row => {
            fun.produkmasuk = row.data;
            var len = row.data.length
            if (len == 0) {
                fun.totalprodukmasuk = 0;
                fun.totalstoklama = 0;
                fun.totalstokbaru = 0;
                fun.totalhargaproduk = 0;
                return
            }
            fun.totalprodukmasuk = row.totalproduk;
            fun.totalstoklama = row.stoklama;
            fun.totalstokbaru = row.stokbaru;
            fun.totalhargaproduk = row.totalhargaproduk;
        })
    }


    fun.tabNavButton = (a) => {
        var resultnew = [];
        var resulthidden = [];
        fun.totalprodukmasuk = 0;
        fun.totalstoklama = 0;
        fun.totalstokbaru = 0;
        fun.totalhargaproduk = 0;
        for (var i = 0; i < tab_nav.length; i++) {
            if (a == i) {
                resultnew.push(i)

            } else {
                resulthidden.push(i)
            }
        }
        tab_nav[a].style.backgroundColor = " #d9e5f9";
        tab_nav[a].style.color = "#387be2";
        content_tab[a].style.display = "block"
        for (var i = 0; i < resulthidden.length; i++) {
            tab_nav[resulthidden[i]].style.backgroundColor = "white";
            tab_nav[resulthidden[i]].style.color = "#AAA";
            content_tab[resulthidden[i]].style.display = "none"
        }


    }
    fun.DataProdukMasuk();

});