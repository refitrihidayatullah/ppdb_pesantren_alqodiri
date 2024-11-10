@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url('/form-pendaftaran-users/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group-row mb-3">
                            <h4>Data Diri</h4>
                            <p>Keterangan : untuk yang bertanda (*) Wajib diisi</p>
                        </div>
                        @if ($cek_user_active)
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Calon Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="user" name="user">
                                 <option value="">Pilih Calon Santri...</option>
                               @if (count($usersWithoutCalonSantri) > 0)
                               @foreach ($usersWithoutCalonSantri as $notCalonSantri)
                               <option value="{{$dataUserById->id_user === $notCalonSantri->id_user ? $dataUserById->id_user : $notCalonSantri->id_user}}" {{$dataUserById->id_user === $notCalonSantri->id_user ? 'selected':''}}>{{$notCalonSantri->name}}</option>
                               @endforeach                     
                               @else
                               <option value="">Belum Ada Calon Santri yang terdaftar</option>                                      
                               @endif
                                </select>
                                @error('user')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                            
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">No Induk Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_no_induk_santri')}}" class="form-control @error('users_no_induk_santri') is-invalid @enderror" id="val-users_no_induk_santri" name="users_no_induk_santri" placeholder="Masukkan No Induk Santri..">
                                @error('users_no_induk_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_nama_lengkap_santri')}}" class="form-control @error('users_nama_lengkap_santri') is-invalid @enderror" id="val-users_nama_lengkap_santri" name="users_nama_lengkap_santri" placeholder="Masukkan Nama Lengkap Santri..">
                                @error('users_nama_lengkap_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="users_jenis_kelamin_santri" name="users_jenis_kelamin_santri">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$kelamin}}">{{$kelamin}}</option>
                                 @endforeach                     
  
                                </select>
                                @error('users_jenis_kelamin_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Masuk Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('users_tanggal_masuk_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-users_tanggal_masuk_santri" value="{{old('users_tanggal_masuk_santri')}}" name="users_tanggal_masuk_santri" placeholder="Masukkan Tanggal Masuk..">
                                @error('users_tanggal_masuk_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Tempat Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_tempat_lahir_santri')}}" class="form-control @error('users_tempat_lahir_santri') is-invalid @enderror" id="val-users_tempat_lahir_santri" name="users_tempat_lahir_santri" placeholder="Masukkan Tempat Lahir Santri..">
                                @error('users_tempat_lahir_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('users_tanggal_lahir_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-users_tanggal_lahir_santri" value="{{old('users_tanggal_lahir_santri')}}" name="users_tanggal_lahir_santri" placeholder="Masukkan Tanggal Lahir Santri..">
                                @error('users_tanggal_lahir_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Provinsi<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="provinsi" name="users_provinsi">
                                 <option value="">Pilih Provinsi...</option>
                                 @foreach ($provinsis as $provinsi)
                                     <option value="{{$provinsi->id_provinsi}}">{{$provinsi->name}}</option>
                                 @endforeach
  
                                </select>
                                @error('users_provinsi')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kabupaten">Kabupaten<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kabupaten" name="users_kabupaten">
  
                                </select>
                                @error('users_kabupaten')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kecamatan">Kecamatan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kecamatan" name="users_kecamatan">
                                    
  
                                </select>
                                @error('users_kecamatan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kelurahan">Kelurahan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kelurahan" name="users_kelurahan">
                                    
  
                                </select>
                                @error('users_kelurahan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Dusun Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_dusun_santri')}}" class="form-control @error('users_dusun_santri') is-invalid @enderror" id="val-users_dusun_santri" name="users_dusun_santri" placeholder="Masukkan Dusun Santri..">
                                @error('users_dusun_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_jenjang_pendidikan">Jenjang Pendidikan Yang Dipilih<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-users_jenjang_pendidikan" name="users_jenjang_pendidikan">
                                    <option value="">Pilih..</option>  
                                    @foreach ($jenjang_pendidikan as $pendidikan)        
                                    <option value="{{$pendidikan}}">{{$pendidikan}}</option>
                                    @endforeach                  
                                </select>
                                @error('users_jenjang_pendidikan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_foto_santri">Foto Santri 3x4<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control  @error('users_foto_santri') is-invalid @enderror" id="val-users_foto_santri" name="users_foto_santri">
                            </div>
                            @error('users_foto_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                        </div>
                        <div class="form-group-row mb-3">
                            <h4>Data Orang Tua/Wali</h4>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Ayah<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_nama_ayah')}}" class="form-control @error('users_nama_ayah') is-invalid @enderror" id="val-nama_ayah" name="users_nama_ayah" placeholder="Masukkan Nama Lengkap Ayah..">
                                @error('users_nama_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ayah">Pekerjaan Ayah<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ayah" name="users_pekerjaan_ayah">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$pekerjaan}}">{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('users_pekerjaan_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('users_nama_ibu')}}" class="form-control @error('users_nama_ibu') is-invalid @enderror" id="val-users_nama_ibu" name="users_nama_ibu" placeholder="Masukkan Nama Lengkap Ibu..">
                                @error('users_nama_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_pekerjaan_ibu">Pekerjaan Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ibu" name="users_pekerjaan_ibu">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$pekerjaan}}">{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('users_pekerjaan_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_no_telp_ortu">No Telp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('users_no_telp_ortu')}}" class="form-control @error('users_no_telp_ortu') is-invalid @enderror" id="val-users_no_telp_ortu" name="users_no_telp_ortu" placeholder="Masukkan No Telp..">
                                @error('users_no_telp_ortu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-users_pekerjaan_ayah">Informasi PPDB<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-users_informasi_ppdb" name="users_informasi_ppdb">
                                    <option value="" >Pilih..</option>
                                    @foreach ($informasi_ppdb as $info_ppd)
                                    <option value="{{$info_ppd}}">{{$info_ppd}}</option>
                                    @endforeach
                                </select>
                                @error('users_informasi_ppdb')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                @if (Auth::user()->level == "admin" || Auth::user()->level == "superadmin")
                                <a href="{{url('/users')}}" type="button" class="btn btn-secondary">Kembali</a>
                                @else
                                <a href="{{url('/dashboard-santri')}}" type="button" class="btn btn-secondary">Kembali</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection