/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);
app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;

    var username = document.getElementById("username")
    var password = document.getElementById("password")

    fun.LoginAkun = () => {
        const userlen = username.value.length;
        const passlen = password.value.length;

        if (userlen == 0 && passlen == 0) {
            swal({
                text: "Masukan Username Dan Password Terlebih Dahulu !",
                icon: "warning"
            })
            return
        } else if (userlen == 0) {
            swal({
                text: "Username masih kosong !",
                icon: "warning"
            })
            return
        } else if (passlen == 0) {
            swal({
                text: "Password Masih Kosong",
                icon: "warning"
            })
            return
        }
        const obj = {
            username: username.value,
            password: password.value
        }

        service.LoginAkun(obj, (res) => {
            if (res.count > 0) {
                swal({
                    text: "Login Berhasil",
                    icon: "success"
                })
                return
            }

            swal({
                text: "Login Gagal",
                icon: "error"
            })
        })

    }
});