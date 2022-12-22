app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"
    this.dataSuplier = function(callback) {
        $http({
            url: APIGOLANG + "suplier/DataSuplier",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.createSuplier = function(obj, callback) {
        $http({
            url: APIGOLANG + "suplier/SaveSuplier",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.updateSuplier = function(obj, callback) {
        $http({
            url: APIGOLANG + "suplier/UpdateSuplier",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.deleteSuplier = function(id, callback) {
        $http({
            url: APIGOLANG + "suplier/DeleteSuplier/" + id,
            method: "GET",
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);