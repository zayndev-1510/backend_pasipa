app.service("service", ["$http", function($http) {
    var link = "http://localhost:8000/api/admin/";
    var dashboard = "http://localhost:8080/dashboard/main"
    this.LoginAkun = function(obj, callback) {
        $http({
            url: link + "login_akun",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


}]);