@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Create Users Panitia')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/users/store-panitia')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('panitiaName')}}" class="form-control @error('panitiaName') is-invalid @enderror" id="val-panitiaName" name="panitiaName" placeholder="Masukkan Nama Lengkap..">
                                @error('panitiaName')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('panitiaEmail') is-invalid @enderror" id="val-panitiaEmail" value="{{old('panitiaEmail')}}" name="panitiaEmail" placeholder="Masukkan Email Anda..">
                                @error('panitiaEmail')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('panitiaNo_hp')}}" class="form-control @error('panitiaNo_hp') is-invalid @enderror" id="val-panitiaNo_hp" name="panitiaNo_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('panitiaNo_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-panitiaJenkel">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="panitiaJenkel" name="panitiaJenkel">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$kelamin}}" {{old('panitiaJenkel') == $kelamin ? 'selected': ''}}>{{$kelamin}}</option>
                                 @endforeach                     
                                </select>
                                @error('panitiaJenkel')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="panitiaLevel">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$status}}" {{ old('level') == $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('panitiaLevel')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('panitiaPassword') is-invalid @enderror" id="val-panitiaPassword" name="panitiaPassword" placeholder="Masukkan Password Anda..">
                                @error('panitiaPassword')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password_confirm">Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="val-panitiaPassword_confirm" name="panitiaPassword_confirm" placeholder="Masukkan Password Anda..">
                                @error('panitiaPassword_confirm')
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