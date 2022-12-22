

@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{$data->keterangan}}</span></li>
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
                                        <th>Nama Kasir</th>
                                        <th>Nomor Hp</th>
                                        <th>Alamat</th>
                                        <th>Username</th>
                                        <th>Sandi</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datakasir">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_kasir }}</td>
                                        <td>@{{ row.nomor_hp }}</td>
                                        <td>@{{ row.alamat }}</td>
                                        <td>@{{ row.username }}</td>
                                        <td>@{{ row.sandi }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="EditKasir(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="HapusKasir(row)"></span>
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
            <div class="modal-dialog" style="max-width: 40%">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">@{{ket}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="margin: auto">
                                <img src="{{ asset('assets/default.jpg')}}" style="margin: auto;width:100%;height: 450px;" id="img-kasir" ng-click="openFile()"/>
                                <input type="file" id="file" name="file" style="display: none" onchange="preview(event)"/>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <h5 style="border-bottom: 3px solid whitesmoke;margin-bottom: 10px;">Data Umum</h5>
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nama Kasir</p>
                                <input type="text" class="form-control kasir" placeholder="Nama Kasir">
                               
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Alamat</p>
                                <input type="text" class="form-control kasir" placeholder="Nama Alamat">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nomor Handphone</p>
    
                            <input type="number" class="form-control kasir" placeholder="Nomor Handphone">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Pendidikan</p>
 
                            <input type="text" class="form-control kasir" placeholder="Pendidikan">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Tanggal Lahir</p>

                            <input type="date" class="form-control kasir">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Jenis Kelamin</p>
                          
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control kasir">
                                <option value="">Pilih Kelamin</option>
                                <option value="L">Pria</option>
                                <option value="P">Wanita</option>
                            </select>
                            <h5 style="border-bottom: 3px solid whitesmoke;margin-bottom: 10px;margin-top: 20px;">Data Akun</h5>

                            <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nama Pengguna</p>
                            <input type="text" class="form-control kasir" placeholder="Nama Pengguna">
                           
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Kata Sandi</p>
                            <input type="password" class="form-control kasir" placeholder="Kata Sandi">

                            </div>
                        </div>         
                        
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveKasir()"><i class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateKasir()"><i class="ti-save"></i> PERBARUI</button>
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
    <script src="{{ asset('assets/js/admin/kasir/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/kasir/service.js') }}"></script>
@endsection
