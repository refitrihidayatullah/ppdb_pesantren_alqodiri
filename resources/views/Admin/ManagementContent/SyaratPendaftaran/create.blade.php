@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Create Syarat Pendaftaran Content')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/content/store-syaratpendaftaran')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-title_syarat_pendaftaran">Nama Syarat<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('title_syarat_pendaftaran')}}" class="form-control @error('title_syarat_pendaftaran') is-invalid @enderror" id="val-name" name="title_syarat_pendaftaran" placeholder="Masukkan Title Syarat Pendaftaran..">
                                @error('title_syarat_pendaftaran')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-sub_title_syarat_pendaftaran">Keterangan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <textarea name="sub_title_syarat_pendaftaran" id="sub_title_syarat_pendaftaran" cols="30" class="form-control @error('sub_title_syarat_pendaftaran') is-invalid @enderror" rows="10" placeholder="Isi keterangan..">{{old('sub_title_syarat_pendaftaran')}}</textarea>
                                @error('sub_title_syarat_pendaftaran')
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