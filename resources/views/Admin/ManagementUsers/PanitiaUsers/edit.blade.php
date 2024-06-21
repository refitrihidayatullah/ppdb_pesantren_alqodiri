@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Edit Users Panitia')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/users/update-panitia/".$dataPanitia->id_user)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('updatePanitiaName')?:$dataPanitia->name}}" class="form-control @error('updatePanitiaName') is-invalid @enderror" id="val-updatePanitiaName" name="updatePanitiaName" placeholder="Masukkan Nama Lengkap..">
                                @error('updatePanitiaName')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('updatePanitiaEmail') is-invalid @enderror" id="val-updatePanitiaEmail" value="{{old('updatePanitiaEmail')?:$dataPanitia->email}}" name="updatePanitiaEmail" placeholder="Masukkan Email Anda..">
                                @error('updatePanitiaEmail')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('updatePanitiaNo_hp')?:$dataPanitia->no_hp}}" class="form-control @error('updatePanitiaNo_hp') is-invalid @enderror" id="val-updatePanitiaNo_hp" name="updatePanitiaNo_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('updatePanitiaNo_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="updatePanitiaLevel">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$dataPanitia->level === $status? $dataPanitia->level:$status}}" {{ $dataPanitia->level === $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('updatePanitiaLevel')
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