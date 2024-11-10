@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Create Informasi Pelayanan Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/content/store-informasipelayanan')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-dari_tanggal_pembukaan_pendaftaran">Tanggal Pembukaan Pendaftaran<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('dari_tanggal_pembukaan_pendaftaran')}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="dari_tanggal_pembukaan_pendaftaran" placeholder="Tanggal Pembukaan Pendaftaran..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('sampai_tanggal_pembukaan_pendaftaran')}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="sampai_tanggal_pembukaan_pendaftaran" placeholder="Sampai Tanggal Pembukaan Pendaftaran..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-layanan_putra">Tempat Kantor Layanan Putra<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-layanan_putra" value="{{old('layanan_putra')}}" name="layanan_putra" placeholder="Masukkan Tempat Kantor Pelayanan Putra..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-layanan_putri">Tempat Kantor Layanan Putri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-layanan_putri" value="{{old('layanan_putri')}}" name="layanan_putri" placeholder="Masukkan Tempat Kantor Pelayanan Putri..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-dari_tanggal_verifikasi_berkas">Tanggal Verifikasi Berkas<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('dari_tanggal_verifikasi_berkas')}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="dari_tanggal_verifikasi_berkas" placeholder="Tanggal Verifikasi Berkas..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('sampai_tanggal_verifikasi_berkas')}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="sampai_tanggal_verifikasi_berkas" placeholder="Sampai Tanggal Verifikasi Berkas..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-tempat_verifikasi_berkas">Tempat Kantor Verifikasi Berkas<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('tempat_verifikasi_berkas')}}" class="form-control" id="val-tempat_verifikasi_berkas" name="tempat_verifikasi_berkas" placeholder="Masukkan Tempat Kantor Verifikasi Berkas..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-dari_pelayanan_waktu_pagi">Waktu Pelayanan Pagi<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('dari_pelayanan_waktu_pagi')}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="18:00" id="val-name" name="dari_pelayanan_waktu_pagi" placeholder="Waktu Pelayanan Pagi..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('sampai_pelayanan_waktu_pagi')}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="18:00" id="val-name" name="sampai_pelayanan_waktu_pagi" placeholder="Sampai Waktu Pelayanan Pagi..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-dari_pelayanan_waktu_siang">Waktu Pelayanan Siang<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('dari_pelayanan_waktu_siang')}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="23:00" id="val-name" name="dari_pelayanan_waktu_siang" placeholder="Waktu Pelayanan Siang..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('sampai_pelayanan_waktu_siang')}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="23:00" id="val-name" name="sampai_pelayanan_waktu_siang" placeholder="Sampai Waktu Pelayanan Siang..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{url('/content')}}" type="button" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection