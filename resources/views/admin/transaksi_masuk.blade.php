@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-hide="container">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-12">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Suplier</th>
                                        <th>Total Produk</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in transaksi">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nomor_transaksi }}</td>
                                        <td>@{{ row.nomor_keranjang }}</td>
                                        <td>@{{ row.pembeli.nama }}</td>
                                        <td>@{{ row.total }}</td>
                                        <td ng-if="row.status==0">Selesai</td>
                                        <td ng-if="row.status==1">Proses</td>

                                        <td>
                                            <button class="btn btn-primary"
                                            ng-click="detailTransaksi(row)" style="width: 100%;"><i class="ti-edit"></i> Detail</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5" ng-show="container">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                               <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset("icon/back.png")}}"/>
                                </div>
                               </div>
                            </div>
                            <div class="col-2">
                                <p style="font-size: 17px">@{{total | currency:"Rp.":0}}</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tbody style="font-size: 12px;">
                                            <tr>
                                                <td>Nomor Transaksi</td>
                                                <td>:</td>
                                                <td>@{{nomor_transaksi}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Keranjang</td>
                                                <td>:</td>
                                                <td>@{{nomor_keranjang}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pembeli</td>
                                                <td>:</td>
                                                <td>@{{nama_pembeli}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tbody style="font-size: 12px;">
                                            <tr>
                                                <td>Total Harga</td>
                                                <td>:</td>
                                                <td>@{{total}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Produk</td>
                                                <td>:</td>
                                                <td>@{{jumlahproduk}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Transaksi</td>
                                                <td>:</td>
                                                <td>@{{format_tgl}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>     
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="margin-top: 20px;margin-bottom: 20px;">Daftar Produk</h5>
                                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="row in produk">
                                    <td>@{{ $index + 1 }}</td>
                                    <td>@{{ row.nama_barang }}</td>
                                    <td>@{{ row.jumlah }}</td>
                                    <td>@{{ row.harga }}</td>
                                    <td>@{{row.jumlah*row.harga}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>@{{total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Uang Pembayaran</td>
                                    <td>
                                        <input type="text" class="form-control" pattern="(\d+)(,\s*\d+)*" placeholder="Masukan Uang Pembayaran" id="rupiah" ng-model="uangbayar" ng-change="getKembalian(total)">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Uang Kembali</td>
                                    <td>
                                      <p id="uangkembalian"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Aksi</td>
                                    <td>
                                        <button class="btn btn-primary"
                                        ng-click="selesaiTransaksi()" style="width: 100%;">Selesai</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                                </div>
                                
                            </div>
                           
                         
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">@{{ket}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div style="border-bottom: 2px solid #CCC;">
                            <div class="row">
                                <div class="col-md-7">
                                    <p style="font-size: 14px;"><small style="color: red"></small> Nomor Transaksi</p>
                                </div>
                                <div class="col-md-5">
                                    <p style="font-size: 12px;"><small style="color: red"></small> @{{nomor_transaksi}}</p>
                                </div>
                            </div>
                        </div>

                        <div style="border-bottom: 2px solid #CCC;">
                            <div class="row">
                                <div class="col-md-7">
                                    <p style="font-size: 14px;"><small style="color: red"></small> Nomor Keranjang</p>
                                </div>
                                <div class="col-md-5">
                                    <p style="font-size: 12px;"><small style="color: red"></small> @{{nomor_keranjang}}</p>
                                </div>
                            </div>
                        </div>

                        <div style="border-bottom: 2px solid #CCC;">
                            <div class="row">
                                <div class="col-md-7">
                                    <p style="font-size: 14px;"><small style="color: red"></small> Tanggal Transaksi</p>
                                </div>
                                <div class="col-md-5">
                                    <p style="font-size: 12px;"><small style="color: red"></small> @{{format_tgl}}</p>
                                </div>
                            </div>
                        </div>
                        <h5 style="margin-top: 20px;">Daftar Produk</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="row in produk">
                                    <td>@{{ $index + 1 }}</td>
                                    <td>@{{ row.nama_barang }}</td>
                                    <td>@{{ row.jumlah }}</td>
                                    <td>@{{ row.harga }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>@{{total}}</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveBarang()"><i class="ti-save"></i> KONFIRMASI</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateBarang()"><i class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i> BATAL</button>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>

    <div id="cover-spin">
        <div class="modal-message">
            <h2 class="animate">Loading</h2>
        </div>
    </div>


@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/transaksi/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/transaksi/service.js') }}"></script>
@endsection
