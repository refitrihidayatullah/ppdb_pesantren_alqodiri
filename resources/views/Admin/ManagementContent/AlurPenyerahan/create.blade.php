@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Create Alur Penyerahan Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/content/store-alurpenyerahan')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-title_alur_penyerahan_santri">Nama<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('title_alur_penyerahan_santri')}}" class="form-control @error('title_alur_penyerahan_santri') is-invalid @enderror" id="val-name" name="title_alur_penyerahan_santri" placeholder="Masukkan Title Alur Penyerahan Santri..">
                                @error('title_alur_penyerahan_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-sub_title_alur_penyerahan_santri">Keterangan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea name="sub_title_alur_penyerahan_santri" id="sub_title_alur_penyerahan_santri" cols="30" class="form-control @error('sub_title_alur_penyerahan_santri') is-invalid @enderror" rows="10" placeholder="Isi keterangan..">{{old('sub_title_alur_penyerahan_santri')}}</textarea>
                                @error('sub_title_alur_penyerahan_santri')
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