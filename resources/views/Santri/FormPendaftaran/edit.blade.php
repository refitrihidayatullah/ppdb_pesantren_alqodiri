@extends('Layout.main')
@section('breadcrumb1','Dashboard')
@section('breadcrumb2','Dashboard')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{url("/form-pendaftaran/update/".$dataPendaftaranById['id_user'])}}" method="POST">
                        @csrf
                        <div class="form-group-row mb-3">
                            <h4>Data Diri</h4>
                            <p>Keterangan : untuk yang bertanda (*) Wajib diisi</p>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">No Induk Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text"  value="{{old('update_no_induk_santri')?:$dataPendaftaranById['calon_santris']['no_induk_santri']}}" class="form-control @error('update_no_induk_santri') is-invalid @enderror" id="val-no_induk_santri" name="update_no_induk_santri" placeholder="Masukkan No Induk Santri..">
                                @error('update_no_induk_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_nama_lengkap_santri')?:$dataPendaftaranById['calon_santris']['nama_lengkap_santri']}}" class="form-control @error('update_nama_lengkap_santri') is-invalid @enderror" id="val-nama_lengkap_santri" name="update_nama_lengkap_santri" placeholder="Masukkan Nama Lengkap Santri..">
                                @error('update_nama_lengkap_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Jenis Kelamin<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="jenis_kelamin_santri" name="update_jenis_kelamin_santri">
                                 <option value="">Pilih Jenis Kelamin...</option>
                                 @foreach ($jenis_kelamin as $kelamin)
                                 <option value="{{$dataPendaftaranById['calon_santris']['jenis_kelamin_santri'] == $kelamin ? $dataPendaftaranById['calon_santris']['jenis_kelamin_santri']: $kelamin}}" {{$dataPendaftaranById['calon_santris']['jenis_kelamin_santri'] == $kelamin ?'selected':''}} >{{$kelamin}}</option>
                                 @endforeach                     
  
                                </select>
                                @error('update_jenis_kelamin_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Masuk Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('update_tanggal_masuk_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-tanggal_masuk_santri" value="{{old('update_tanggal_masuk_santri')?:$dataPendaftaranById['calon_santris']['tanggal_daftar']}}" name="update_tanggal_masuk_santri" placeholder="Masukkan Tanggal Masuk..">
                                @error('update_tanggal_masuk_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Tempat Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('tempat_lahir_santri')?:$dataPendaftaranById['calon_santris']['tempat_lahir_santri']}}" class="form-control @error('update_tempat_lahir_santri') is-invalid @enderror" id="val-tempat_lahir_santri" name="update_tempat_lahir_santri" placeholder="Masukkan Tempat Lahir Santri..">
                                @error('update_tempat_lahir_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-email">Tanggal Lahir Santri<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control @error('update_tanggal_lahir_santri') is-invalid @enderror" onfocus="(this.type='date')" onblur="(this.type='text')" id="val-tanggal_lahir_santri" value="{{old('tanggal_lahir_santri')?:$dataPendaftaranById['calon_santris']['tanggal_lahir_santri']}}" name="update_tanggal_lahir_santri" placeholder="Masukkan Tanggal Lahir Santri..">
                                @error('update_tanggal_lahir_santri')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-provinsi">Provinsi<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="provinsi" name="update_provinsi" >
                                 <option value="">Pilih Provinsi...</option>
                                 @foreach ($provinsis as $provinsi)
                                 <option value="{{$dataPendaftaranById['alamat_calon_santri']['provinsi_id'] == $provinsi->id_provinsi?$dataPendaftaranById['alamat_calon_santri']['provinsi_id']:$provinsi->id_provinsi}}" {{$dataPendaftaranById['alamat_calon_santri']['provinsi_id'] == $provinsi->id_provinsi?'selected':''}}>{{$provinsi->name}}-{{$provinsi->id_provinsi}}</option>
                                 @endforeach
                                </select>
                                @error('update_kabupaten')
                                <div class="form-text text-danger">{{$message}}.</div>  
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kabupaten">Kabupaten<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kabupaten" name="update_kabupaten" >
                                </select>
                                @error('update_kabupaten')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-kecamatan">Kecamatan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kecamatan" name="update_kecamatan" >
                                    
  
                                </select>
                                @error('update_kecamatan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="kelurahan">Kelurahan<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="kelurahan" name="update_kelurahan" >
                                    
  
                                </select>
                                @error('update_kelurahan')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_hp">Dusun Santri<span class="text-danger"></span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_dusun_santri')?:$dataPendaftaranById['alamat_calon_santri']['dusun_santri']}}" class="form-control @error('update_dusun_santri') is-invalid @enderror" id="val-dusun_santri" name="update_dusun_santri" placeholder="Masukkan Dusun Santri..">
                                @error('update_dusun_santri')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-jenjang_pendidikan">Jenjang Pendidikan Yang Dipilih<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-jenjang_pendidikan" name="update_jenjang_pendidikan">
                                    <option value="">Pilih..</option>  
                                    @foreach ($jenjang_pendidikan as $pendidikan)        
                                    <option value="{{$dataPendaftaranById['calon_santris']['jenjang_pendidikan'] == $pendidikan ? $dataPendaftaranById['calon_santris']['jenjang_pendidikan'] : $pendidikan}}" {{$dataPendaftaranById['calon_santris']['jenjang_pendidikan'] == $pendidikan?'selected':''}}>{{$pendidikan}}</option>
                                    @endforeach                  
                                </select>
                                @error('update_jenjang_pendidikan')
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
                                <input type="text" value="{{old('update_nama_ayah')?:$dataPendaftaranById['orang_tua_calon_santri']['nama_ayah']}}" class="form-control @error('update_nama_ayah') is-invalid @enderror" id="val-nama_ayah" name="update_nama_ayah" placeholder="Masukkan Nama Lengkap Ayah..">
                                @error('update_nama_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ayah">Pekerjaan Ayah<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ayah" name="update_pekerjaan_ayah">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ayah'] == $pekerjaan?$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ayah']:$pekerjaan}}" {{$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ayah'] == $pekerjaan?'selected':''}}>{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('update_pekerjaan_ayah')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-name">Nama Lengkap Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" value="{{old('update_nama_ibu')?:$dataPendaftaranById['orang_tua_calon_santri']['nama_ibu']}}" class="form-control @error('update_nama_ibu') is-invalid @enderror" id="val-nama_ibu" name="update_nama_ibu" placeholder="Masukkan Nama Lengkap Ibu..">
                                @error('update_nama_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ibu">Pekerjaan Ibu<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-pekerjaan_ibu" name="update_pekerjaan_ibu">
                                    <option value="" >Pilih Pekerjaan..</option>
                                    @foreach ($pekerjaan_ortu as $pekerjaan)
                                    <option value="{{$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ibu'] == $pekerjaan?$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ibu']:$pekerjaan}}"{{$dataPendaftaranById['orang_tua_calon_santri']['pekerjaan_ibu'] == $pekerjaan ?'selected':''}}>{{$pekerjaan}}</option>
                                    @endforeach
                                </select>
                                @error('update_pekerjaan_ibu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-no_telp_ortu">No Telp<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" value="{{old('update_no_telp_ortu')?:$dataPendaftaranById['orang_tua_calon_santri']['no_telp_ortu']}}" class="form-control @error('update_no_telp_ortu') is-invalid @enderror" id="val-no_telp_ortu" name="update_no_telp_ortu" placeholder="Masukkan No Telp..">
                                @error('update_no_telp_ortu')
                                <div class="form-text text-danger">{{$message}}.</div>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-pekerjaan_ayah">Informasi PPDB<span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" id="val-informasi_ppdb" name="update_informasi_ppdb">
                                    <option value="" >Pilih..</option>
                                    @foreach ($informasi_ppdb as $info_ppdb)
                                    <option value="{{$dataPendaftaranById['informasi_ppdb']['name'] == $info_ppdb ? $dataPendaftaranById['informasi_ppdb']['name'] : $info_ppdb}}" {{$dataPendaftaranById['informasi_ppdb']['name'] == $info_ppdb ? 'selected':''}}>{{$info_ppdb}}</option>
                                    @endforeach
                                </select>
                                @error('update_informasi_ppdb')
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

{{-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> --}}


@endsection
