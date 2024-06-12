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
                    <h2 class="text-white">4</h2>
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
                    <h2 class="text-white">3</h2>
                    <p class="text-white mb-0">Belum Tervefrifikasi</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">New Customers</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">4565</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Customer Satisfaction</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">99%</h2>
                    <p class="text-white mb-0">Jan - March 2019</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection