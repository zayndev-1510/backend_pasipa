@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{ $data->keterangan}}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                                    ng-click="tambahData()" style="width: 100%;"><i class="ti-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Barocde</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in barang">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nomor_barcode }}</td>
                                        <td>@{{ row.nama_barang }}</td>
                                        <td>@{{ row.harga }}</td>
                                        <td>@{{ row.stok }}</td>
                                        <td>@{{ row.harga_jual }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="detailBarang(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="deleteKelas(row)"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <input type="text" class="form-control barang" placeholder="Nomor Barcode">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nomor Barcode</p>

                        <input type="text" class="form-control barang" placeholder="Nama Produk">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nama Produk</p>


                        <input type="number" class="form-control barang" placeholder="Harga Produk">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Harga Produk</p>

                        <input type="number" class="form-control barang" placeholder="Stok Produk">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Stok Produk</p>

                        <input type="number" class="form-control barang" placeholder="Harga Jual Produk">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Harga Jual Produk</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveBarang()"><i class="ti-save"></i> SIMPAN</button>
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
    <script src="{{ asset('assets/js/admin/barang/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/barang/service.js') }}"></script>
@endsection
