@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Edit Informasi Pelayanan Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/content/update-informasipelayanan/".$getDataInformasiPelayananById->id_informasi_pelayanan)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_dari_tanggal_pembukaan_pendaftaran">Tanggal Pembukaan Pendaftaran<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_dari_tanggal_pembukaan_pendaftaran')?:$getDataInformasiPelayananById->dari_tanggal_pembukaan_pendaftaran}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="update_dari_tanggal_pembukaan_pendaftaran" placeholder="Tanggal Pembukaan Pendaftaran..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_sampai_tanggal_pembukaan_pendaftaran')?:$getDataInformasiPelayananById->sampai_tanggal_pembukaan_pendaftaran}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="update_sampai_tanggal_pembukaan_pendaftaran" placeholder="Sampai Tanggal Pembukaan Pendaftaran..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_layanan_putra">Tempat Kantor Layanan Putra<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-update_layanan_putra" value="{{old('update_layanan_putra')?:$getDataInformasiPelayananById->layanan_putra}}" name="update_layanan_putra" placeholder="Masukkan Tempat Kantor Pelayanan Putra..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_layanan_putri">Tempat Kantor Layanan Putri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="val-update_layanan_putri" value="{{old('update_layanan_putri')?:$getDataInformasiPelayananById->layanan_putri}}" name="update_layanan_putri" placeholder="Masukkan Tempat Kantor Pelayanan Putri..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_dari_tanggal_verifikasi_berkas">Tanggal Verifikasi Berkas<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_dari_tanggal_verifikasi_berkas')?:$getDataInformasiPelayananById->dari_tanggal_verifikasi_berkas}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="update_dari_tanggal_verifikasi_berkas" placeholder="Tanggal Verifikasi Berkas..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_sampai_tanggal_verifikasi_berkas')?:$getDataInformasiPelayananById->sampai_tanggal_verifikasi_berkas}}" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="val-name" name="update_sampai_tanggal_verifikasi_berkas" placeholder="Sampai Tanggal Verifikasi Berkas..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_tempat_verifikasi_berkas">Tempat Kantor Verifikasi Berkas<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_tempat_verifikasi_berkas')?:$getDataInformasiPelayananById->tempat_verifikasi_berkas}}" class="form-control" id="val-update_tempat_verifikasi_berkas" name="update_tempat_verifikasi_berkas" placeholder="Masukkan Tempat Kantor Verifikasi Berkas..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_dari_pelayanan_waktu_pagi">Waktu Pelayanan Pagi<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_dari_pelayanan_waktu_pagi')?:$getDataInformasiPelayananById->dari_pelayanan_waktu_pagi}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="18:00" id="val-name" name="update_dari_pelayanan_waktu_pagi" placeholder="Waktu Pelayanan Pagi..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_sampai_pelayanan_waktu_pagi')?:$getDataInformasiPelayananById->sampai_pelayanan_waktu_pagi}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="18:00" id="val-name" name="update_sampai_pelayanan_waktu_pagi" placeholder="Sampai Waktu Pelayanan Pagi..">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_dari_pelayanan_waktu_siang">Waktu Pelayanan Siang<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_dari_pelayanan_waktu_siang')?:$getDataInformasiPelayananById->dari_pelayanan_waktu_siang}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="23:00" id="val-name" name="update_dari_pelayanan_waktu_siang" placeholder="Waktu Pelayanan Siang..">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" value="{{old('update_sampai_pelayanan_waktu_siang')?:$getDataInformasiPelayananById->sampai_pelayanan_waktu_siang}}" onfocus="(this.type='time')" onblur="(this.type='text')" class="form-control" step="1" min="07:00" max="23:00" id="val-name" name="update_sampai_pelayanan_waktu_siang" placeholder="Sampai Waktu Pelayanan Siang..">
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