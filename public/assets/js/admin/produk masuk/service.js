app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"
    this.ProdukMasuk = function(tgl, callback) {
        $http({
            url: APIGOLANG + "produk/masuk/" + tgl,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.SaveProdukMasuk = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/masuk/save",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.DataSuplier = function(callback) {
        $http({
            url: APIGOLANG + "suplier/DataSuplier",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.DataProduk = function(callback) {
        $http({
            url: APIGOLANG + "produk/loadDataProduk",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }




}]);