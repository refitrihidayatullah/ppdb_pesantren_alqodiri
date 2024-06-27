@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Create Users')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/users/store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="val-name" name="name" placeholder="Masukkan Nama Lengkap..">
                                @error('name')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="val-email" value="{{old('email')}}" name="email" placeholder="Masukkan Email Anda..">
                                @error('email')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror" id="val-no_hp" name="no_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('no_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="level">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$status}}" {{ old('level') == $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('level')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="val-password" name="password" placeholder="Masukkan Password Anda..">
                                @error('password')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password_confirm">Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="val-password_confirm" name="password_confirm" placeholder="Masukkan Password Anda..">
                                @error('password_confirm')
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