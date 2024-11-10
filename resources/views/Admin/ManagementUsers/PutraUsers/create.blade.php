@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Create Users Putra')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/users/store-putra')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('putraName')}}" class="form-control @error('putraName') is-invalid @enderror" id="val-putraName" name="putraName" placeholder="Masukkan Nama Lengkap..">
                                @error('putraName')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('putraEmail') is-invalid @enderror" id="val-putraEmail" value="{{old('putraEmail')}}" name="putraEmail" placeholder="Masukkan Email Anda..">
                                @error('putraEmail')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('putraNo_hp')}}" class="form-control @error('putraNo_hp') is-invalid @enderror" id="val-putraNo_hp" name="putraNo_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('putraNo_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-putraJenkel">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="putraJenkel" name="putraJenkel">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$kelamin}}" {{old('putraJenkel') == $kelamin ? 'selected': ''}}>{{$kelamin}}</option>
                                 @endforeach                     
                                </select>
                                @error('putraJenkel')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="putraLevel">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$status}}" {{ old('putraLevel') == $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('putraLevel')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('putraPassword') is-invalid @enderror" id="val-putraPassword" name="putraPassword" placeholder="Masukkan Password Anda..">
                                @error('putraPassword')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password_confirm">Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="val-putraPassword_confirm" name="putraPassword_confirm" placeholder="Masukkan Password Anda..">
                                @error('putraPassword_confirm')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{url('/users')}}" type="button" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection