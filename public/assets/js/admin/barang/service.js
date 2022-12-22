app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"
    this.dataBarang = function(callback) {
        $http({
            url: APIGOLANG + "produk/loadDataProduk",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createProduk = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/createProduk",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateProduk = function(obj, callback) {
        $http({
            url: APIGOLANG + "produk/updateProduk",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);