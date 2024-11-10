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
                
                @php
                    $cekStatus = DB::table('users')
                    ->join('status_validasis','users.id_user','=','status_validasis.user_id')
                    ->select('users.id_user','users.level','status_validasis.nama_status_validasi')
                    ->where('users.id_user',Auth::user()->id_user)
                    ->where('users.level','calonsantri')
                    ->first();
                @endphp
                @if ($cekStatus && $cekStatus->level == "calonsantri")
                    @if ($cekStatus->nama_status_validasi == "completed")
                    <h6 class="text-center text-secondary">*Form pendaftaran sudah diverifikasi oleh panitia silakan lanjut ke dashboard untuk mencetak form pendaftaran</h6>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="/dashboard-santri" class="btn btn-lg btn-primary">Dashboard</a>
                        </div>
                    @else
                    <h6 class="text-center text-secondary">*Anda masih bisa merubah isian formulir pendaftaran selama belum divalidasi oleh panitia ppdb dengan cara pilih edit form pendaftaran</h6>
                    <div class="d-flex justify-content-around mt-5">
                        <a href="/form-pendaftaran/{{$cek_user_active}}/edit" class="btn btn-lg btn-secondary">Edit Form Pendaftaran</a>
                        <a href="/dashboard-santri" class="btn btn-lg btn-primary">Dashboard</a>
                    </div>
                    @endif
                @else
                <h6 class="text-center text-secondary">*Anda masih bisa merubah isian formulir pendaftaran selama belum divalidasi oleh panitia ppdb dengan cara pilih edit form pendaftaran</h6>
                <div class="d-flex justify-content-around mt-5">
                    <a href="/form-pendaftaran/{{$cek_user_active}}/edit" class="btn btn-lg btn-secondary">Edit Form Pendaftaran</a>
                    <a href="/dashboard-santri" class="btn btn-lg btn-primary">Dashboard</a>
                </div>                    
                @endif
            </div>
        </div>
    </div>
</div>


@endsection