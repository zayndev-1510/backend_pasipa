/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var suplier = document.getElementsByClassName("suplier");
    var id_suplier = 0;
    fun.aksi = false;

    fun.getDataSuplier = () => {
        service.dataSuplier(respon => {
            fun.suplier = respon.data
        })
    }
    fun.getDataSuplier();

    fun.clearValue = () => {
        for (var i = 0; i < suplier.length; i++) {
            suplier[i].value = "";
        }
        fun.aksi = false
    }

    fun.tambahData = () => {
        fun.ket = "Tambah Suplier";
        fun.clearValue();
    }

    fun.detailSuplier = (row) => {
        fun.aksi = true
        id_suplier = row.id;
        suplier[0].value = row.nama_suplier;
        suplier[1].value = row.email;
        suplier[2].value = row.nomor_hp;
        suplier[3].value = row.alamat;
    }

    fun.saveSuplier = () => {
        var obj = {
            nama_suplier: suplier[0].value,
            email: suplier[1].value,
            nomor_hp: suplier[2].value,
            alamat: suplier[3].value

        }
        service.createSuplier(obj, (res) => {

            if (res.count > 0) {
                swal({
                    text: res.message,
                    icon: "success"
                })
                fun.getDataSuplier();
                fun.clearValue()
            } else {
                swal({
                    text: res.message,
                    icon: "success"
                })
            }


        })
    }
    fun.updateSuplier = () => {
        var obj = {
            id: id_suplier,
            nama_suplier: suplier[0].value,
            email: suplier[1].value,
            nomor_hp: suplier[2].value,
            alamat: suplier[3].value
        }
        service.updateSuplier(obj, (res) => {

            if (res.count > 0) {
                swal({
                    text: res.message,
                    icon: "success"
                })
                fun.getDataSuplier();

                fun.clearValue()
            } else {
                swal({
                    text: res.message,
                    icon: "success"
                })
            }


        })

    }

    fun.deleteSuplier = (row) => {
        service.deleteSuplier(row.id, (res) => {

            if (res.count > 0) {
                swal({
                    text: res.message,
                    icon: "success"
                })
                fun.getDataSuplier();

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