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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2" ng-click="tabNavButton(0,1)">
                                       <div class="tab-nav">
                                        <h5>Produk Masuk Hari Ini</h5>
                                       </div>
                                    </div>
                                    <div class="col-3" ng-click="tabNavButton(1,0)">
                                        <div class="tab-nav">
                                            <h5>Tambah Produk Masuk</h5>
                                           </div>
                                    </div>
                                </div>
                                <hr style="border:1px solid #AAA;"></hr>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
          
        
            
            <div class="col-12 mt-0" ng-hide="template">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
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
                                    <tr class="text-center" ng-repeat="row in produkmasuk">
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
                                <tfoot>
                                    <tr>
                                        <td colspan="7">Total Produk </td>
                                        <td class="text-center">@{{totalprodukmasuk}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Total Stok Lama</td>
                                        <td class="text-center">@{{totalstoklama}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Total Stok Produk</td>
                                        <td class="text-center">@{{totalstokbaru}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Total Harga Produk</td>
                                        <td class="text-center">@{{totalhargaproduk | currency:"Rp. ":0}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-0" ng-show="template">
                <div class="card" style="margin-top: -30px;">
                    <div class="card-body" id="tabel-toko">
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Suplier</h5>
                                    <hr></hr>
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th >No</th>
                                                <th>Nama Suplier</th>
                                                <th>Nomor Hp</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datasuplier">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_suplier }}</td>
                                                <td>@{{ row.nomor_hp }}</td>
                                                <td>@{{ row.alamat}}</td>
                                                <td>
                                                    <button class="btn btn-primary" ng-hide="row.status"
                                                    ng-click="setUpSuplier(row,0)" style="width: 100%;"> Pilih</button>
                                                    <button class="btn btn-danger" ng-show="row.status"
                                                    ng-click="setUpSuplier(row,1)" style="width: 100%;">Batal</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Produk</h5>
                                    <hr></hr>
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th >No</th>
                                                <th>Produk</th>
                                                <th>Stok</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in dataproduk">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_barang }}</td>
                                                <td>@{{ row.stok }}</td>
                                                <td style="width: 15%;">
                                                    <input type="number" class="form-control" ng-model="row.jumlah" />
                                                </td>
                                                <td>@{{ row.harga}}</td>
                                                <td>
                                                    <button class="btn btn-primary" style="width: 100%;" ng-click="tambahListProduk(row)"><i class="ti-plus"></i> Produk Masuk</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12" style="margin-top: 20px;">
                                    <h5>Transaksi Produk Masuk</h5>
                                    <table class="table">
                                        <tbody>
                                            <tr style="width: 50px;">
                                                <td>Nama Suplier</td>
                                                <td>:</td>
                                                <td>@{{nama_suplier}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Handphone</td>
                                                <td>:</td>
                                                <td>@{{nomor_hp}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>@{{email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>@{{alamat}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th >No</th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Stok Baru</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in produkmasuk">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_barang }}</td>
                                                <td>@{{ row.input }}</td>
                                                <td>@{{ row.harga}}</td>
                                                <td>@{{row.stokbaru}}</td>
                                                <td>@{{row.subtotal}}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">Jumlah Total Produk</td>
                                                <td class="text-center">@{{totalproduk}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">Jumlah Total Harga</td>
                                                <td class="text-center">@{{totalharga}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <button class="btn btn-primary"
                                    ng-click="saveProdukMasuk()"><i class="ti-save"></i> SAVE PRODUK MASUK</button>

                                </div>
                            </div>
                         
                        </div>
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
    <script src="{{ asset('assets/js/admin/produk masuk/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/produk masuk/service.js') }}"></script>
@endsection
