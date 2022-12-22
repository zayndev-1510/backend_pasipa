@extends('admin.layout.template');
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Pengguna</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-8 mt-5" style="margin: auto">
                <div class="card">
                    <div class="card-body" id="detail-toko">
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="warisan">
                                        <p>Berapakah Total Warisan ? </p>
                                        <input type="text" class="form-control" id="val_warisan"/>

                                        <p>Jenis Kelamin Pewaris ? </p>
                                        <select class="form-control" id="jk_pewaris" ng-model="jk_pewaris" ng-change="getJk()">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="warisan">
                                        <p>Apakah Pewaris Mempunyai  </p>

                                    </div>
                                    <div class="warisan">
                                        <p>Apakah Pewaris Mempunyai  </p>

                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-danger">Kembali</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-success pull-right" ng-click="next()">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/login/akun.js') }}"></script>
    <script src="{{ asset('assets/js/admin/login/service.js') }}"></script>
@endsection
