@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li class="poppins"><span>{{ $data->keterangan }}</span></li>
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
                                <p style="font-size: 17px;font-weight: 800" class="poppins">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary poppins" data-toggle="modal" data-target="#myModal"
                                    ng-click="tambahData()" style="width: 100%;"><i class="ti-plus"></i> Tambah
                                    Data</button>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-4">
                                <select class="form-control" ng-change="get_sub_bidang()" ng-model="id_bidangs">
                                    <option value="">Pilih Bidang</option>
                                    <option ng-repeat="row in data_bidang" value="@{{ row.id_bidang }}">
                                        @{{ row.bidang }}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" ng-model="id_sub_bidangs">
                                    <option value="">Pilih Sub Bidang</option>
                                    <option ng-repeat="row in data_sub_bidang" value="@{{ row.id }}">
                                        @{{ row.sub_bidang }}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success poppins" ng-click="get_kegiatan()"> Filter Data</button>
                                <button class="btn btn-danger poppins" ng-click="loadData()"> Segarkan Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered table-jabatan">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>Kode Kegiatan</th>
                                        <th>Bidang</th>
                                        <th>Sub Bidang</th>
                                        <th>Kegaitan</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datakegiatan">
                                        <td>@{{ row.kode_bidang }} . @{{ row.kode_sub_bidang }} . @{{ row.kode_kegiatan }}</td>
                                        <td>@{{ row.bidang }}</td>
                                        <td>@{{ row.sub_bidang }}</td>
                                        <td>@{{ row.kegiatan }}</td>
                                        <td>
                                           <div class="row">
                                            <div class="col-5">
                                                <button class="alert alert-info" ng-click="editData(row)" data-toggle="modal" data-target="#myModal"> Edit</button>
                                            </div>
                                            <div class="col-5">
                                                <button class="alert alert-danger" ng-click="delete(row)"> Hapus</button>
                                            </div>
                                           </div>

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
                        <h4 class="modal-title">@{{ ket }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-item">
                            <select class="bidang forms-label" name="id_bidang" ng-change="getSubBidang(id_bidang)"
                                ng-model="id_bidang">
                                <option value="">Pilih Bidang</option>
                                <option value="@{{ row.id_bidang }}" ng-repeat="row in databidang">
                                    @{{ row.bidang }}
                                </option>
                            </select>
                            <label for="bidang">Bidang</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <select class="bidang forms-label" name="id_sub_bidang">
                                <option value="@{{ row.id }}" ng-repeat="row in subbidangs">
                                    @{{ row.sub_bidang }}
                                </option>
                            </select>
                            <label for="bidang">Sub Bidang</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="bidang forms-label" name="kode_kegiatan">
                            <label for="jenis">Kode Kegiatan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>
                        <div class="form-item">
                            <input type="text" class="bidang forms-label" name="keterangan">
                            <label for="jenis">Kegiatan</label>
                            <p class="poppins"><small style="color: red"> * </small> Wajib Di Isi</p>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveBidang()"><i
                                class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateBidang()"><i
                                class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i>
                            BATAL</button>
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
    <script src="{{ asset('assets/js/admin/kegiatan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/kegiatan/service.js') }}"></script>
@endsection
