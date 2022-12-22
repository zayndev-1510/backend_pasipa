app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/";
    this.dataAlumni= function (callback) {
        $http({
            url:  link+"data-alumni",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.dataMahasiswa= function (callback) {
        $http({
            url:  link+"grafik-mahasiswa",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

}]);
