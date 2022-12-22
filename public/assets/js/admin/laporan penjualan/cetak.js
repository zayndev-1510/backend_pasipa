/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;

    var data = JSON.parse(localStorage.getItem("datacetak"))
    if (data != undefined) {
        console.log(data)
        fun.datatransaksi = data;
    }

});