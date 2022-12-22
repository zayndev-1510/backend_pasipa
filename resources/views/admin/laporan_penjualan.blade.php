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
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2" ng-click="tabNavButton(0)">
                                           <div class="tab-nav">
                                            <h5>Transaksi Penjualan Keseluruhan</h5>
                                           </div>
                                        </div>
                                        <div class="col-3" ng-click="tabNavButton(1)">
                                            <div class="tab-nav">
                                                <h5>Transaksi Penjualan Bulanan</h5>
                                               </div>
                                        </div>
                                        <div class="col-3" ng-click="tabNavButton(2)">
                                            <div class="tab-nav">
                                                <h5>Transaksi Penjualan Tahunan</h5>
                                               </div>
                                        </div>
                                    </div>
                                    <hr style="border:1px solid #AAA;"></hr>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-0 content-tab">

                    <div class="card">
                        <div class="card-body" id="tabel-toko">
                            <div class="row">
                                <div class="col-3">
                                    <h5 style="margin-top: 10px;">Penjualan Produk Keseluruhan</h5>
                                </div>
                                <div class="col-7">
                                
                                </div>
                                <div class="col-2">
                                    <p class="btn btn-success pull-right" ng-click="cetakLaporan()">Cetak Laporan</p>
                                </div>
                             
                               </div>
                                <hr></hr>
                            <div class="data-tab">
                                <table datatable="ng" class="table table-bordered">
                                    <thead class="bg-light" style="font-size: 12px;">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Nomor Keranjang</th>
                                            <th>Pembelio</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr class="text-center" ng-repeat="row in datatransaksi">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ row.nomor_transaksi }}</td>
                                            <td>@{{ row.nomor_keranjang }}</td>
                                            <td>@{{ row.pembeli.nama }}</td>
                                            <td>@{{ row.total }}</td>
                                            <td>@{{row.tgl}}</td>
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
                <div class="col-12 mt-0 content-tab">
                    <div class="card">
                        <div class="card-body" id="tabel-toko">
                            <div class="data-tab">
                                <div class="row">

                                    <div class="col-3">
                                        <h5 style="margin-top: 10px;">Penjualan Produk Bulanan</h5>
                                    </div>
                                    <div class="col-7">
                                     <div class="row">
                                        <div class="col-3">
                                            <input type="date" class="form-control" id="startmonth"/>
                                        </div>
                                        <div class="col-1">
                                          <p style="font-size: 25px;text-align: center;margin-top: 10px;">-</p>
                                        </div>
                                        <div class="col-3">
                                            <input type="date" class="form-control" id="endmonth"/>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" ng-click="filterData()">Filter Data</button>
                                         </div>
                                     </div>
                                    </div>
                                    <div class="col-2">
                                        <p class="btn btn-success pull-right" ng-click="cetakLaporan()">Cetak Laporan</p>
                                    </div>
                                </div>
                                <hr></hr>
                                 
                                <table datatable="ng" class="table table-bordered">
                                    <thead class="bg-light" style="font-size: 12px;">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Nomor Keranjang</th>
                                            <th>Pembelio</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr class="text-center" ng-repeat="row in datatransaksimonth">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ row.nomor_transaksi }}</td>
                                            <td>@{{ row.nomor_keranjang }}</td>
                                            <td>@{{ row.pembeli.nama }}</td>
                                            <td>@{{ row.total }}</td>
                                            <td>@{{row.tgl}}</td>
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
                <div class="col-12 mt-0 content-tab">
                    <div class="card">
                        <div class="card-body" id="tabel-toko">
                            <div class="data-tab">
                                <div class="row">
                                    <div class="col-3">
                                        <h5 style="margin-top: 10px;">Penjualan Produk Tahunan</h5>
                                    </div>
                                    <div class="col-7">
                                     <div class="row">
                                        <div class="col-3">
                                            <input type="number" placeholder="2002" class="form-control" id="startyear"/>
                                        </div>
                                        <div class="col-1">
                                          <p style="font-size: 25px;text-align: center;margin-top: 10px;">-</p>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" placeholder="2003" class="form-control" id="endyear"/>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" ng-click="filterDataTahunan()">Filter Data</button>
                                         </div>
                                     </div>
                                    
                                    </div>
                                    <div class="col-2">
                                        <p class="btn btn-success pull-right" ng-click="cetakLaporan()">Cetak Laporan</p>
                                    </div>
                                 
                                   </div>
                                <table datatable="ng" class="table table-bordered">
                                    <thead class="bg-light" style="font-size: 12px;">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nomor Transaksi</th>
                                            <th>Nomor Keranjang</th>
                                            <th>Pembelio</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr class="text-center" ng-repeat="row in datatransaksiyear">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ row.nomor_transaksi }}</td>
                                            <td>@{{ row.nomor_keranjang }}</td>
                                            <td>@{{ row.pembeli.nama }}</td>
                                            <td>@{{ row.total }}</td>
                                            <td>@{{row.tgl}}</td>
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
    <script src="{{ asset('assets/js/admin/laporan penjualan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan penjualan/service.js') }}"></script>
@endsection
