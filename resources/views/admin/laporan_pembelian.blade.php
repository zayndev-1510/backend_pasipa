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
                                    <div class="col-2" ng-click="tabNavButton(0)">
                                       <div class="tab-nav">
                                        <h5>Produk Keseluruhan</h5>
                                       </div>
                                    </div>
                                    <div class="col-3" ng-click="tabNavButton(1)">
                                        <div class="tab-nav">
                                            <h5>Produk Bulanan</h5>
                                           </div>
                                    </div>
                                    <div class="col-3" ng-click="tabNavButton(2)">
                                        <div class="tab-nav">
                                            <h5>Produk Tahunan</h5>
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
                            <div class="col-10">
                                <h5 style="margin-top: 10px;">Pembelian Produk Keseluruhan</h5>
                            </div>
                            <div class="col-2">
                                <p class="btn btn-primary pull-right" ng-click="cetakLaporan()">Cetak Laporan</p>
                            </div>
                        </div>
                        <hr></hr>
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

            <div class="col-12 mt-0 content-tab">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                       <div class="row">
                        <div class="col-3">
                            <h5 style="margin-top: 10px;">Pembelian Produk Bulanan</h5>
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
                                    <tr class="text-center" ng-repeat="row in produkmasukbulanan" ng-if="lengthproduk!=0">
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

            <div class="col-12 mt-0 content-tab">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row">
                            <div class="col-3">
                                <h5 style="margin-top: 10px;">Pembelian Produk Tahunan</h5>
                            </div>
                            <div class="col-6">
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
                         
                           </div>
                            <hr></hr>
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
                                    <tr ng-if="lengthproduk==0">
                                        <td colspan="8">Tidak ada data</td>
                                    </tr>
                                    <tr class="text-center" ng-repeat="row in produkmasuktahunan" ng-if="lengthproduk!=0">
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
    <script src="{{ asset('assets/js/admin/laporan pembelian/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/laporan pembelian/service.js') }}"></script>
@endsection
