@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')

<div  style="height:800px; " class="row d-flex flex-column justify-content-center align-items-center">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Successfuly!!</h1>
                <h4 class="text-center">Pendaftaran Berhasil Disimpan , silahkan pilih dashboard dan cetak bukti pendaftaran</h4>
                <h6 class="text-center text-secondary">*Anda masih bisa merubah isian formulir pendaftaran selama belum divalidasi oleh panitia ppdb dengan cara pilih edit form pendaftaran</h6>

                <div class="d-flex justify-content-around mt-5">
                    <a href="/form-pendaftaran/{{$cek_user_active}}/edit" class="btn btn-lg btn-secondary">Edit Form Pendaftaran</a>
                    <a href="/dashboard-santri" class="btn btn-lg btn-primary">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection