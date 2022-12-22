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
        <p style="font-size: 17px;font-weight: bolder;text-align: center;">Laporan Penjualan Produk</p>
        
    </div>
    <table class="table table-bordered">
        <thead class="bg-light" style="font-size: 12px;">
            <tr class="text-center" style="text-align: center;">
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Nomor Keranjang</th>
                <th>Pembelio</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px">
            <tr class="text-center" style="text-align: center" ng-repeat="row in datatransaksi">
                <td>@{{ $index + 1 }}</td>
                <td>@{{ row.nomor_transaksi }}</td>
                <td>@{{ row.nomor_keranjang }}</td>
                <td>@{{ row.pembeli.nama }}</td>
                <td>@{{ row.total }}</td>
                <td>@{{row.tgl}}</td>
                <td ng-if="row.status==0">Selesai</td>
                <td ng-if="row.status==1">Proses</td>
            </tr>
        </tbody>
    </table>
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan penjualan/cetak.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan penjualan/service.js') }}"></script>
</body>

</html>