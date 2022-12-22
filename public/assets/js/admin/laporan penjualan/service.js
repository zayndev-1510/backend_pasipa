app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"


    this.dataTransaksi = function(callback) {
        $http({
            url: APIGOLANG + "transaksi/loadDataTransaksiAll",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataTransaksiMonth = function(obj, callback) {
        $http({
            url: APIGOLANG + "transaksi/loadDataTransaksiMonth",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.dataTransaksiYear = function(obj, callback) {
        $http({
            url: APIGOLANG + "transaksi/loadDataTransaksiYear",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

}]);