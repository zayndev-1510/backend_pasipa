/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);
app.controller("homeController", function($scope, service) {

    var func = $scope;
    var service = service;
    var produk = []
    var tab_nav = document.getElementsByClassName("tab-nav")
    var content_tab = document.getElementsByClassName("content-tab")
    var startmonth = document.getElementById("startmonth")
    var endmonth = document.getElementById("endmonth")
    var startyear = document.getElementById("startyear")
    var endyear = document.getElementById("endyear")
    var aksi = 0;

    for (var i = 1; i < tab_nav.length; i++) {
        tab_nav[i].style.backgroundColor = "white";
        tab_nav[i].style.color = "#AAA";
        content_tab[i].style.display = "none"
    }

    func.filterData = () => {
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
        service.dataTransaksiMonth(obj, row => {
            func.lengthproduk = row.data.length;
            var len = row.count;
            if (len > 0) {
                func.datatransaksimonth = row.data;
            }
        })

    }
    func.filterDataTahunan = () => {
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
        service.dataTransaksiYear(obj, row => {
            func.lengthproduk = row.data.length;
            var len = row.count;
            if (len > 0) {
                func.datatransaksiyear = row.data;
            }
        })
    }

    func.DataTransaksi = () => {
        service.dataTransaksi(row => {
            var len = row.count;
            if (len > 0) {
                func.datatransaksi = row.data
            }
        })
    }
    func.DataTransaksi();


    func.tabNavButton = (a) => {
        aksi = a;
        var resultnew = [];
        var resulthidden = [];
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


    func.cetakLaporan = () => {
        var datalaporan = [];
        if (aksi == 0) {
            datalaporan = func.datatransaksi
        } else if (aksi == 1) {
            datalaporan = func.datatransaksimonth
        } else if (aksi == 2) {
            datalaporan = func.datatransaksiyear
        }
        if (datalaporan == undefined) {
            swal({
                text: "Data Laporan Yang Akan DiCetak Masih Kosong",
                icon: "warning"
            })

            return
        }

        const obj = {
            datalaporan: datalaporan
        }

        localStorage.setItem("datacetak", JSON.stringify(datalaporan))
        window.location.href = "http://localhost:8000/admin/cetak-laporan-penjualan";
    }


})