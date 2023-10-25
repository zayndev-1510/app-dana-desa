app.service("service", ["$http", function ($http) {


    this.get_anggaran_tahun = function (callback) {
        $http({
            url: URL_API + "anggaran-tahun",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.get_anggaran_kegiatan = function (callback) {
        $http({
            url: URL_API + "anggaran-kegiatan",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.get_anggaran_pendapatan = function (callback) {
        $http({
            url: URL_API + "rap",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.get_anggaran_rab = function (callback) {
        $http({
            url: URL_API + "rab",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

}]);
