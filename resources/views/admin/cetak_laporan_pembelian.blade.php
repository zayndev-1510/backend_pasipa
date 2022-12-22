<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}"  media="screen, print">
    <title>Laporan Data Siswa</title>
</head>

<body ng-controller="homeController">
    <div class="header-report">
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/1.jpg') }}">
        </div>
        <div class="" style="text-align: center;border-bottom: 2px solid black;" >
            <p style="font-size: 18px;font-weight: bolder;">TOKO SWALAYAN PASIPA</p>
            <p style="font-size: 13px;margin-top:-20px;">JL. ERLANGGA NO 247 KEL.BONEBONE KEC BATUPOARO KOTA BAUBAU</p>
            <p style="font-size: 13px;margin-top:-10px;font-weight: bolder;">Izin Op No 153 Tahun 2019 – NSM : 101274720032</p>
        </div>
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/2.png') }}">
        </div>
    </div>
    <div>
        <p style="font-size: 17px;font-weight: bolder;text-align: center;">Laporan Pembelian Produk</p>
        
    </div>
    <table class="table">
        <thead class="bg-light" style="font-size: 12px;">
            <tr class="text-center">
                <th >No</th>
                <th>Suplier</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Stok Lama</th>
                <th>Stok Baru</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
         <tbody style="font-size: 12px">
                                    <tr style="text-align: center" ng-repeat="row in produkmasuk">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_suplier }}</td>
                                        <td>@{{ row.nama_barang }}</td>
                                        <td>@{{ row.jumlah}}</td>
                                        <td>@{{ row.stok_lama}}</td>
                                        <td>@{{ row.stok_lama+row.jumlah}}</td>
                                        <td>@{{row.harga | currency:"Rp. ":0}}</td>
                                        <td>@{{row.tgl}}</td>
                                    </tr>
                                </tbody>
    </table>
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan pembelian/cetak.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan pembelian/service.js') }}"></script>
</body>

</html>