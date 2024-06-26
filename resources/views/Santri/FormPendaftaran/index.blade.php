@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/form-pendaftaran/store')}}" method="POST">
                        @csrf
                        <div class="form-group-row mb-3">
                            <h4>Data Diri</h4>
                            <p>Keterangan : untuk yang bertanda (*) Wajib diisi</p>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">No Induk Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('no_induk_santri')}}" class="form-control @error('no_induk_santri') is-invalid @enderror" id="val-no_induk_santri" name="no_induk_santri" placeholder="Masukkan No Induk Santri..">
                                @error('no_induk_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('nama_lengkap_santri')}}" class="form-control @error('nama_lengkap_santri') is-invalid @enderror" id="val-nama_lengkap_santri" name="nama_lengkap_santri" placeholder="Masukkan Nama Lengkap Santri..">
                                @error('nama_lengkap_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="jenis_kelamin_santri" name="jenis_kelamin_santri">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$kelamin}}">{{$kelamin}}</option>
                                 @endforeach                     
  
                                </select>
                                @error('jenis_kelamin_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Masuk Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('tanggal_masuk_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-tanggal_masuk_santri" value="{{old('tanggal_masuk_santri')}}" name="tanggal_masuk_santri" placeholder="Masukkan Tanggal Masuk..">
                                @error('tanggal_masuk_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Tempat Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('tempat_lahir_santri')}}" class="form-control @error('tempat_lahir_santri') is-invalid @enderror" id="val-tempat_lahir_santri" name="tempat_lahir_santri" placeholder="Masukkan Tempat Lahir Santri..">
                                @error('tempat_lahir_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('tanggal_lahir_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-tanggal_lahir_santri" value="{{old('tanggal_lahir_santri')}}" name="tanggal_lahir_santri" placeholder="Masukkan Tanggal Lahir Santri..">
                                @error('tanggal_lahir_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Provinsi<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="provinsi" name="provinsi">
                                 <option value="">Pilih Provinsi...</option>
                                 @foreach ($provinsis as $provinsi)
                                     <option value="{{$provinsi->id_provinsi}}">{{$provinsi->name}}-{{$provinsi->id_provinsi}}</option>
                                 @endforeach
  
                                </select>
                                @error('kabupaten')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kabupaten">Kabupaten<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kabupaten" name="kabupaten">
  
                                </select>
                                @error('kabupaten')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kecamatan">Kecamatan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kecamatan" name="kecamatan">
                                    
  
                                </select>
                                @error('kecamatan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kelurahan">Kelurahan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kelurahan" name="kelurahan">
                                    
  
                                </select>
                                @error('kelurahan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Dusun Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('dusun_santri')}}" class="form-control @error('dusun_santri') is-invalid @enderror" id="val-dusun_santri" name="dusun_santri" placeholder="Masukkan Dusun Santri..">
                                @error('dusun_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-jenjang_pendidikan">Jenjang Pendidikan Yang Dipilih<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-jenjang_pendidikan" name="jenjang_pendidikan">
                                    <option value="">Pilih..</option>  
                                    @foreach ($jenjang_pendidikan as $pendidikan)        
                                    <option value="{{$pendidikan}}">{{$pendidikan}}</option>
                                    @endforeach                  
                                </select>
                                @error('jenjang_pendidikan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group-row mb-3">
                            <h4>Data Orang Tua/Wali</h4>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Ayah<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('nama_ayah')}}" class="form-control @error('nama_ayah') is-invalid @enderror" id="val-nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Lengkap Ayah..">
                                @error('nama_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ayah">Pekerjaan Ayah<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ayah" name="pekerjaan_ayah">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$pekerjaan}}">{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('pekerjaan_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('nama_ibu')}}" class="form-control @error('nama_ibu') is-invalid @enderror" id="val-nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Lengkap Ibu..">
                                @error('nama_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ibu">Pekerjaan Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ibu" name="pekerjaan_ibu">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$pekerjaan}}">{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('pekerjaan_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_telp_ortu">No Telp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('no_telp_ortu')}}" class="form-control @error('no_telp_ortu') is-invalid @enderror" id="val-no_telp_ortu" name="no_telp_ortu" placeholder="Masukkan No Telp..">
                                @error('no_telp_ortu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ayah">Informasi PPDB<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-informasi_ppdb" name="informasi_ppdb">
                                    <option value="" >Pilih..</option>
                                    @foreach ($informasi_ppdb as $info_ppd)
                                    <option value="{{$info_ppd}}">{{$info_ppd}}</option>
                                    @endforeach
                                </select>
                                @error('informasi_ppdb')
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