app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"
    this.ProdukKeluar = function(callback) {
        $http({
            url: APIGOLANG + "produk/keluar",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }




}]);