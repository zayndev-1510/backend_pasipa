app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var link_cetak = "http://localhost:8000/admin/"
    var APIGOLANG = "http://localhost:8080/"
    this.ProdukMasuk = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/masuk/" + obj,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.LaporanPembelian = function(obj, callback) {
        $http({
            url: link_cetak + "cetak-laporan-pembelian",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.ProdukMasukFilterMonth = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/masuk/filter",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.ProdukMasukFilterTahunan = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/masuk/filter",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


}]);