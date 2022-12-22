/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var produkKeluar = document.getElementsByClassName("produk-keluar");
    fun.aksi = false;

    fun.DataProdukKeluar = () => {
        service.ProdukKeluar(row => {
            fun.produkkeluar = row.data;
            fun.totalproduk = row.totalproduk;
        })
    }

    fun.DataProdukKeluar();
});