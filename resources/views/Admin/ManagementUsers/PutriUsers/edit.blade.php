@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Edit Users Putri')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/users/update-putri/".$dataPutri->id_user)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('updatePutriName')?:$dataPutri->name}}" class="form-control @error('updatePutriName') is-invalid @enderror" id="val-updatePutriName" name="updatePutriName" placeholder="Masukkan Nama Lengkap..">
                                @error('updatePutriName')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('updatePutriEmail') is-invalid @enderror" id="val-updatePutriEmail" value="{{old('updatePutriEmail')?:$dataPutri->email}}" name="updatePutriEmail" placeholder="Masukkan Email Anda..">
                                @error('updatePutriEmail')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">No Hp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('updatePutriNo_hp')?:$dataPutri->no_hp}}" class="form-control @error('updatePutriNo_hp') is-invalid @enderror" id="val-updatePutriNo_hp" name="updatePutriNo_hp" placeholder="Masukkan Nomor Telp Anda..">
                                @error('updatePutriNo_hp')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-updatePutriJenkel">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="updatePutriJenkel" name="updatePutriJenkel">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$dataPutri->jenkel === $kelamin ? $dataPutri->jenkel : $kelamin}}" {{$dataPutri->jenkel === $kelamin ? 'selected': ''}}>{{$kelamin}}</option>
                                 @endforeach                     
                                </select>
                                @error('updatePutriJenkel')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-level">Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-level" name="updatePutriLevel">
                                    <option value="">Pilih..</option>
                                    @foreach ($statusUser as $status)
                                    <option value="{{$dataPutri->level === $status? $dataPutri->level:$status}}" {{ $dataPutri->level === $status ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('updatePutriLevel')
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