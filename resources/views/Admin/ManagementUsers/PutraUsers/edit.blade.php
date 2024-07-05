@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Edit Users Putra')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/users/update-putra/".$dataPutra->id_user)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('updatePutraName')?:$dataPutra->name}}" class="form-control @error('updatePutraName') is-invalid @enderror" id="val-updatePutraName" name="updatePutraName" placeholder="Masukkan Nama Lengkap..">
                                @error('updatePutraName')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('updatePutraEmail') is-invalid @enderror" id="val-updatePutraEmail" value="{{old('updatePutraEmail')?:$dataPutra->email}}" name="updatePutraEmail" placeholder="Masukkan Email Anda..">
                                @error('updatePutraEmail')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('updatePutraNo_hp')?:$dataPutra->no_hp}}" class="form-control @error('updatePutraNo_hp') is-invalid @enderror" id="val-updatePutraNo_hp" name="updatePutraNo_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('updatePutraNo_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="updatePutraLevel">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$dataPutra->level === $status? $dataPutra->level:$status}}" {{ $dataPutra->level === $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('updatePutraLevel')
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