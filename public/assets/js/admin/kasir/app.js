/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function preview(event) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if (ext == "jpg" || ext == 'png') {
        const loadimg = document.getElementById("img-kasir");
        loadimg.src = URL.createObjectURL(event.target.files[0]);

    } else {
        swal({
            text: "Format file tidak mendukung",
            icon: "warning",
        });
    }
}

var app = angular.module("homeApp", ['ngRoute', 'datatables']);

app.controller("homeController", function($scope, service) {

    var func = $scope;
    var service = service;
    var kasir = document.getElementsByClassName("kasir")

    var id_pengguna = 0;
    func.openFile = () => {
        document.getElementById("file").click()
    }

    func.DataKasir = () => {
        service.DataKasir(row => {
            func.datakasir = row.data;
        })
    }

    func.DataKasir();

    func.EditKasir = (row) => {
        func.aksi = true

        kasir[0].value = row.nama_kasir
        kasir[1].value = row.alamat
        kasir[2].value = row.nomor_hp
        kasir[3].value = row.pendidikan
        kasir[4].value = row.tgl_lahir
        kasir[5].value = row.jenis_kelamin
        kasir[6].value = row.username
        kasir[7].value = row.sandi
        id_pengguna = row.id_kasir
        const loadimg = document.getElementById("img-kasir");
        if (row.foto == "") {
            loadimg.src = "http://localhost:8000/akun/default.jpg";
            return
        }
        loadimg.src = "http://localhost:8000/akun/" + row.foto

    }
    func.tambahData = () => {
        func.aksi = false
        func.ket = "Buat Data Kasir"
        for (var i = 0; i < kasir.length; i++) {
            kasir[i].value = ""
        }
        const loadimg = document.getElementById("img-kasir");
        loadimg.src = "http://localhost:8000/akun/default.jpg";
    }
    func.saveKasir = () => {
        var obj = {
            "kasir": {
                nama_kasir: kasir[0].value,
                alamat: kasir[1].value,
                nomor_hp: kasir[2].value,
                pendidikan: kasir[3].value,
                tgl_lahir: kasir[4].value,
                jenis_kelamin: kasir[5].value,
                foto: ""
            },
            "akun": {
                username: kasir[6].value,
                sandi: kasir[7].value,
                hak_akses: 2,
            }
        }
        var filefoto = document.getElementById("file")
        var formdata = new FormData()
        formdata.append("file", filefoto.files[0])
        var generate = makeid(12)
        service.uploadFotoKasir(formdata, generate, (res) => {
            obj.kasir.foto = generate + "/" + res.data;
            if (res.val > 0) {
                service.SaveKasir(obj, row => {
                    if (row.count > 0) {
                        swal({
                            text: "Simpan data kasih berhasil",
                            icon: "success"
                        })
                        func.DataKasir();
                    } else {
                        swal({
                            text: row.message,
                            icon: "error"
                        })
                    }
                })
            }
        });
    }
    func.updateKasir = () => {
        var obj = {
            "kasir": {
                nama_kasir: kasir[0].value,
                alamat: kasir[1].value,
                nomor_hp: kasir[2].value,
                pendidikan: kasir[3].value,
                tgl_lahir: kasir[4].value,
                jenis_kelamin: kasir[5].value,
                id: id_pengguna
            },
            "akun": {
                username: kasir[6].value,
                sandi: kasir[7].value,
            }
        }
        var filefoto = document.getElementById("file")
        var formdata = new FormData()
        formdata.append("file", filefoto.files[0])
        var generate = makeid(12)

        service.UpdateKasir(obj, row => {
            if (row.count > 0) {
                swal({
                    text: "Update data kasih berhasil",
                    icon: "success"
                })
                func.DataKasir();
            } else {
                swal({
                    text: row.message,
                    icon: "error"
                })
            }
        })
    }

    func.HapusKasir = (row) => {
        var obj = {
            id: row.id_kasir
        }
        service.DeleteKasir(obj, res => {
            if (res.count > 0) {
                swal({
                    text: "Hapus Data Berhasil",
                    icon: "success"
                })
                return
            }
            swal({
                text: "Hapus Data Gagal",
                icon: "error"
            })
        })
    }

})