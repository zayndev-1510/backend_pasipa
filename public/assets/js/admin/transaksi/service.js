app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"


    this.dataTransaksi = function(callback) {
        $http({
            url: APIGOLANG + "transaksi/loadDataTransaksi",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataProduk = function(obj, callback) {
        $http({
            url: APIGOLANG + "transaksi/DataProdukTransaksi",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.PerbaruiTransaksi = function(obj, callback) {
        $http({
            url: APIGOLANG + "transaksi/PerbaruiTransaksi",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);