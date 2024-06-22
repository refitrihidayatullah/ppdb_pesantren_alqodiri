@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="#" id="step-form-horizontal" class="step-form-horizontal">
            <div>
                <h4>Data Diri</h4>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="no_induk_santri" class="form-control" placeholder="Masukkan Nomor Induk Santri">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="nama_lengkap_santri" class="form-control" placeholder="Masukkan Nama Lengkap Santri*" required>
                            </div>
                        </div>
                        @php
                            $tanggal_masuk = date('Y-m-d');
                        @endphp
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="tanggal_masuk" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tanggal Masuk" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                </section>
                <h4>Data Orang Tua/Wali</h4>
                <section>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="lastName" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="zip" class="form-control" placeholder="ZIP Code" required>
                            </div>
                        </div>
                    </div>
                </section>>
                <h4>Konfirmasi</h4>
                <section>
                    <div class="row h-100">
                        <div class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                            <h2>Silahkan dicek Terlebih dahulu formulir sebelum dikirim , jika sudah yakin klik kirim lalu silahkan cetak formulir di halaman dashboard</h2>
                            <p>Note: isi formulir dengan benar dan jelas</p>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection