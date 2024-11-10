@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Calon Santri</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalSudahTerverifikasi}}</h2>
                    <p class="text-white mb-0">Sudah Terverifikasi</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Calon Santri</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalBelumTerverifikasi}}</h2>
                    <p class="text-white mb-0">Belum Tervefrifikasi</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Administrator</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalAdmin}}</h2>
                    <p class="text-white mb-0">Admin & superadmin</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Total Users</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$totalAllUsers}}</h2>
                    <p class="text-white mb-0">All Users</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection