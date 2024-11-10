@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Create General Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/content/store-general/')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-title_web">Title<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('title_web')}}" class="form-control @error('title_web') is-invalid @enderror" id="val-name" name="title_web" placeholder="Masukkan Title Web..">
                                @error('title_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-sub_title_web">Nama Pondok<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('sub_title_web') is-invalid @enderror" id="val-sub_title_web" value="{{old('sub_title_web')}}" name="sub_title_web" placeholder="Masukkan Nama Pondok..">
                                @error('sub_title_web')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-data_title_web">Keterangan Pondok<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('data_title_web') is-invalid @enderror" id="val-data_title_web" value="{{old('data_title_web')}}" name="data_title_web" placeholder="Masukkan Keterangan Pondok..">
                                @error('data_title_web')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-dari_tahun_ajaran_web">Tahun ajaran<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-2">
                                <input type="date" value="{{old('dari_tahun_ajaran_web')}}" class="form-control @error('dari_tahun_ajaran_web') is-invalid @enderror" id="val-dari_tahun_ajaran_web" name="dari_tahun_ajaran_web" placeholder="Tahun Ajaran..">
                                @error('dari_tahun_ajaran_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                            <label class="col-lg-1 col-form-label" for="val-sampai_tahun_ajaran_web">Sampai tahun ajaran<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-3">
                                <input type="date" value="{{old('sampai_tahun_ajaran_web')}}" class="form-control @error('sampai_tahun_ajaran_web') is-invalid @enderror" id="val-sampai_tahun_ajaran_web" name="sampai_tahun_ajaran_web" placeholder="Sampai Tahun Ajaran..">
                                @error('sampai_tahun_ajaran_web')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-alamat_pondok">Alamat<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('alamat_pondok')}}" class="form-control @error('alamat_pondok') is-invalid @enderror" id="val-alamat_pondok" name="alamat_pondok" placeholder="Masukkan Alamat Pondok..">
                                @error('alamat_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email_pondok">Email<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="email" value="{{old('email_pondok')}}" class="form-control @error('email_pondok') is-invalid @enderror" id="val-email_pondok" name="email_pondok" placeholder="Masukkan Email Pondok..">
                                @error('email_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-facebook_pondok">No Telp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('no_telp_pondok')}}" class="form-control @error('no_telp_pondok') is-invalid @enderror" id="val-no_telp_pondok" name="no_telp_pondok" placeholder="Masukkan No Telp Pondok..">
                                @error('no_telp_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-facebook_pondok">Facebook<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('facebook_pondok')}}" class="form-control @error('facebook_pondok') is-invalid @enderror" id="val-facebook_pondok" name="facebook_pondok" placeholder="Masukkan link Facebook Pondok..">
                                @error('facebook_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-instagram_pondok">Instagram<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('instagram_pondok')}}" class="form-control @error('instagram_pondok') is-invalid @enderror" id="val-instagram_pondok" name="instagram_pondok" placeholder="Masukkan link Instagram Pondok..">
                                @error('instagram_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-youtube_pondok">Youtube<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('youtube_pondok')}}" class="form-control @error('youtube_pondok') is-invalid @enderror" id="val-youtube_pondok" name="youtube_pondok" placeholder="Masukkan link Youtube Pondok..">
                                @error('youtube_pondok')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-tiktok_pondok">Tiktok<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('tiktok_pondok')}}" class="form-control @error('tiktok_pondok') is-invalid @enderror" id="val-tiktok_pondok" name="tiktok_pondok" placeholder="Masukkan link Tiktok Pondok..">
                                @error('tiktok_pondok')
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