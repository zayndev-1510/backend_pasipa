app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/"
    var APIGOLANG = "http://localhost:8080/"


    this.DataKasir = function(callback) {
        $http({
            url: APIGOLANG + "kasir/DataKasir",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.SaveKasir = function(obj, callback) {
        $http({
            url: APIGOLANG + "kasir/CreateKasir",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.DeleteKasir = function(obj, callback) {
        $http({
            url: APIGOLANG + "kasir/DeleteKasir",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }
    this.UpdateKasir = function(obj, callback) {
        $http({
            url: APIGOLANG + "kasir/UpdateKasir",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.uploadFotoKasir = function(fd, nama, callback) {
        $http({
            url: link + "uploadfotokasir/" + nama,
            method: "POST",
            data: fd,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function(err) {
            callback(err);
        });
    }



}]);