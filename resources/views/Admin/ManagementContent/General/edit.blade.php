@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Edit General Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/content/update-general/".$dataGeneralById->id_content)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_title_web">Title<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_title_web')?:$dataGeneralById->title_web}}" class="form-control @error('update_title_web') is-invalid @enderror" id="val-name" name="update_title_web" placeholder="Masukkan Title Web..">
                                @error('update_title_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_sub_title_web">Nama Pondok<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('update_sub_title_web') is-invalid @enderror" id="val-update_sub_title_web" value="{{old('update_sub_title_web')?:$dataGeneralById->sub_title_web}}" name="update_sub_title_web" placeholder="Masukkan Nama Pondok..">
                                @error('update_sub_title_web')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_data_title_web">Keterangan Pondok<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('update_data_title_web') is-invalid @enderror" id="val-update_data_title_web" value="{{old('update_data_title_web')?:$dataGeneralById->data_title_web}}" name="update_data_title_web" placeholder="Masukkan Keterangan Pondok..">
                                @error('update_data_title_web')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_dari_tahun_ajaran_web">Tahun ajaran<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-2">
                                <input type="date" value="{{old('update_dari_tahun_ajaran_web')?:$dataGeneralById->dari_tahun_ajaran_web}}" class="form-control @error('update_dari_tahun_ajaran_web') is-invalid @enderror" id="val-update_dari_tahun_ajaran_web" name="update_dari_tahun_ajaran_web" placeholder="Tahun Ajaran..">
                                @error('update_dari_tahun_ajaran_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                            <label class="col-lg-1 col-form-label" for="val-update_sampai_tahun_ajaran_web">Sampai tahun ajaran<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-3">
                                <input type="date" value="{{old('update_sampai_tahun_ajaran_web')?:$dataGeneralById->sampai_tahun_ajaran_web}}" class="form-control @error('update_sampai_tahun_ajaran_web') is-invalid @enderror" id="val-update_sampai_tahun_ajaran_web" name="update_sampai_tahun_ajaran_web" placeholder="Sampai Tahun Ajaran..">
                                @error('update_sampai_tahun_ajaran_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_alamat_pondok">Alamat<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_alamat_pondok')?:$dataGeneralById->alamat_pondok}}" class="form-control @error('update_alamat_pondok') is-invalid @enderror" id="val-update_alamat_pondok" name="update_alamat_pondok" placeholder="Masukkan Alamat Pondok..">
                                @error('update_alamat_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_email_pondok">Email<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="email" value="{{old('update_email_pondok')?:$dataGeneralById->email_pondok}}" class="form-control @error('update_email_pondok') is-invalid @enderror" id="val-update_email_pondok" name="update_email_pondok" placeholder="Masukkan Email Pondok..">
                                @error('update_email_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_no_telp_pondok">No Telp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('update_no_telp_pondok')?:$dataGeneralById->no_telp_pondok}}" class="form-control @error('update_no_telp_pondok') is-invalid @enderror" id="val-update_no_telp_pondok" name="update_no_telp_pondok" placeholder="Masukkan No Telp Pondok..">
                                @error('update_no_telp_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_facebook_pondok">Facebook<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_facebook_pondok')?:$dataGeneralById->facebook_pondok}}" class="form-control @error('update_facebook_pondok') is-invalid @enderror" id="val-update_facebook_pondok" name="update_facebook_pondok" placeholder="Masukkan link Facebook Pondok..">
                                @error('update_facebook_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_instagram_pondok">Instagram<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_instagram_pondok')?:$dataGeneralById->instagram_pondok}}" class="form-control @error('update_instagram_pondok') is-invalid @enderror" id="val-update_instagram_pondok" name="update_instagram_pondok" placeholder="Masukkan link Instagram Pondok..">
                                @error('update_instagram_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_youtube_pondok">Youtube<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_youtube_pondok')?:$dataGeneralById->youtube_pondok}}" class="form-control @error('update_youtube_pondok') is-invalid @enderror" id="val-update_youtube_pondok" name="update_youtube_pondok" placeholder="Masukkan link Youtube Pondok..">
                                @error('update_youtube_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-update_tiktok_pondok">Tiktok<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_tiktok_pondok')?:$dataGeneralById->tiktok_pondok}}" class="form-control @error('update_tiktok_pondok') is-invalid @enderror" id="val-update_tiktok_pondok" name="update_tiktok_pondok" placeholder="Masukkan link Tiktok Pondok..">
                                @error('update_tiktok_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
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