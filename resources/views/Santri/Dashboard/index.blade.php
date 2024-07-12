@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img alt="" class="rounded-circle mt-4" src="images/users/5.jpg">
                        <h4 style="text-transform:capitalize;" class="card-widget__title text-dark mt-3">{{$dataSantri['name']??''}}</h4>
                        <p class="text-muted">{{$dataSantri['calon_santris']['nama_lengkap_santri']??'-'}}</p>
                        <a class="btn gradient-4 btn-lg border-0 btn-rounded px-5" href="javascript:void()">{{$dataSantri['statusvalidasi']['nama_status_validasi']??'Belum Mengisi Form Pendaftaran'}}</a>
                    </div>
                </div>
                <div class="card-footer border-0 bg-transparent">
                    <div class="row">
                        <div class="col-4 border-right-1 pt-3">
                            <a class="text-center d-block text-muted" href="javascript:void()">
                                <i class="fa fa-star gradient-1-text" aria-hidden="true"></i>
                                <p class="">Star</p>
                            </a>
                        </div>
                        <div class="col-4 border-right-1 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                            <i class="fa fa-heart gradient-3-text"></i>
                                <p class="">Like</p>
                            </a>
                        </div>
                        <div class="col-4 pt-3"><a class="text-center d-block text-muted" href="javascript:void()">
                            <i class="fa fa-envelope gradient-4-text"></i>
                                <p class="">Email</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body p-5">
                    <h3 class="text-center">Petunjuk Pendaftaran Santri</h3>
                     <h4 class="mt-4">1. Klik menu Formulir terlebih dahulu.</h4>
                     <h4 class="mt-4">2. Isi formulir dengan benar dan lengkap.</h4>
                     <h4 class="mt-4">3. Setelah selesai mengisi, klik tombol "Kirim".</h4>
                     <h4 class="mt-4">4. Jika terdapat kesalahan saat mengisi formulir, Anda dapat mengeditnya.</h4>
                     <h4 class="mt-4">5. Jika Anda sudah yakin dengan isian formulir, klik tombol "Dashboard".</h4>
                     <h4 class="mt-4">6. Anda akan diarahkan ke halaman dashboard. Di sana, silakan cetak formulir pendaftaran.</h4>
                     <h4 class="mt-4">7. Untuk mencetak formulir pendaftaran, klik tombol "Cetak Bukti Pendaftaran".</h4>
                </div>
            </div>
        </div>
</div>
@endsection