@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Data Content')
@section('content')

<div class="col-md-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Content</h4>

            <!-- Nav tabs -->
            <div class="custom-tab-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#general">General</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#alurpendaftaran">Alur Pendaftaran</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#syaratpendaftaran">Syarat Pendaftaran</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imagesyaratpendaftaran">Image Syarat Pendaftaran</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#alurpenyerahan">Alur Penyerahan</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#informasipelayanan">Informasi Pelayanan</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#imageinformasipelayanan">Image Informasi Pelayanan</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @if ($cekContentGeneral == 0)
                                            <a href="{{url('/content/create-general')}}" class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a>
                                            @endif
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Nama Pondok</th>
                                                            <th>Keterangan Pondok</th>
                                                            <th>Tahun Ajaran</th>
                                                            <th>Alamat Pondok</th>
                                                            <th>Email Pondok</th>
                                                            <th>No Telp Pondok</th>
                                                            <th>Facebook Pondok</th>
                                                            <th>Instagram Pondok</th>
                                                            <th>Youtube Pondok</th>
                                                            <th>Tiktok Pondok</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                     @foreach ($dataAllGeneral as $general)      
                                                     <tr>
                                                         <td>{{$general->title_web??''}}</td>
                                                         <td>{{$general->sub_title_web??''}}</td>
                                                         <td>{{$general->data_title_web??''}}</td>
                                                         <td>{{$general->dari_tahun_ajaran_web??''}} - {{$general->sampai_tahun_ajaran_web??''}}</td>
                                                         <td>{{$general->alamat_pondok??''}}</td>
                                                         <td>{{$general->email_pondok??''}}</td>
                                                         <td>{{$general->no_telp_pondok??''}}</td>
                                                         <td>{{$general->facebook_pondok??''}}</td>
                                                         <td>{{$general->instagram_pondok??''}}</td>
                                                         <td>{{$general->youtube_pondok??''}}</td>
                                                         <td>{{$general->tiktok_pondok??''}}</td>
                                                         <td>
                                                                <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                                <div class="dropdown-menu" style="overflow:hidden;">
                                                                    <a  class="dropdown-item" href="{{url("content/".$general->id_content."/edit-general")}}">Edit</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteGeneralModal{{$general->id_content}}" href="#">Delete</a>
                                                                </div>                                                          
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="alurpendaftaran" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        @if ($cekContentAlurPendaftaran < 5)
                                        <a href="{{url('content/create-alurpendaftaran')}}"class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a> 
                                        @endif
                                     
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                   @foreach ($dataAllAlurPendaftaran as $alurPendaftaran)
                                                       
                                                   <tr>
                                                       <td>{{$loop->iteration}}</td>
                                                       <td>{{$alurPendaftaran->title_alur_pendaftaran_online??''}}</td>
                                                       <td>{{$alurPendaftaran->sub_title_alur_pendaftaran_online??''}}</td>
                                                       <td>
                                                           <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                                <div class="dropdown-menu" style="overflow:hidden;">
                                                                    <a  class="dropdown-item" href="{{url("content/".$alurPendaftaran->id_alur_pendaftaran."/edit-alurpendaftaran")}}">Edit</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteAlurPendaftaranModal{{$alurPendaftaran->id_alur_pendaftaran}}" href="#">Delete</a>
                                                                </div>                                                          
                                                            </td>
                                                        </tr>  
                                                  @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="syaratpendaftaran" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @if ($cekContentSyaratPendaftaran < 4)
                                            <a href="{{url('content/create-syaratpendaftaran')}}"class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a> 
                                            @endif
                              
                                        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                               
                                                       
                                                @foreach ($dataAllSyaratPendaftaran as $syaratPendaftaran)
                                                   <tr>
                                                       <td>{{$loop->iteration??''}}</td>
                                                       <td>{{$syaratPendaftaran->title_syarat_pendaftaran??''}}</td>
                                                       <td>{{$syaratPendaftaran->sub_title_syarat_pendaftaran??''}}</td>
                                                       <td>
                                                           <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                           <div class="dropdown-menu" style="overflow:hidden;">
                                                               <a  class="dropdown-item" href="{{url("content/".$syaratPendaftaran->id_syarat_pendaftaran."/edit-syaratpendaftaran")}}">Edit</a>
                                                               <a class="dropdown-item" data-toggle="modal" data-target="#deleteSyaratPendaftaranModal{{$syaratPendaftaran->id_syarat_pendaftaran}}" href="#">Delete</a>
                                                            </div>                                                          
                                                        </td>
                                                    </tr>  
                                                    
                                                @endforeach
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="imagesyaratpendaftaran" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="table-responsive p-4">
                                            @if ($cekImageContentSyaratPendaftaran == 0 || $cekImageContentSyaratPendaftaran == null)
                                            <a data-toggle="modal" data-target="#uploadImageSyaratModal" href="#"class="btn btn-primary btn-sm ml-5">Upload image <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a>
                                            @endif
                                      
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                            <th>No</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                               
                                                       
                                            @foreach ($dataAllImageSyaratPendaftaran as $imageSyarat)
                                                
                                            <tr>
                                                <td>{{$loop->iteration;}}</td>
                                                <td>
                                                    <img width="50px" height="50px" src="{{asset('content_images/'.$imageSyarat->image_syarat)}}" alt="">
                                                </td>
                                                
                                                <td>
                                                    <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                    <div class="dropdown-menu" style="overflow:hidden;">
                                                        <a  class="dropdown-item" data-toggle="modal" data-target="#editImageSyaratModal{{$imageSyarat->id_image_syarat}}" href="#">Edit</a>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#deleteImageSyaratModal{{$imageSyarat->id_image_syarat}}" href="#">Delete</a>
                                                    </div>                                                          
                                                </td>
                                            </tr>  
                                            @endforeach
                                                    
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="alurpenyerahan" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                          @if ($cekContentAlurPenyerahan <= 4)
                                          <a href="{{url('content/create-alurpenyerahan')}}"class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a> 
                                          @endif
                                          
                              
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                        @foreach ($dataAllAlurPenyerahan as $alurPenyerahan)
                                            
                                                   <tr>
                                                       <td>{{$loop->iteration??''}}</td>
                                                       <td>{{$alurPenyerahan->title_alur_penyerahan_santri??''}}</td>
                                                       <td>{{$alurPenyerahan->sub_title_alur_penyerahan_santri??''}}</td>
                                                       <td>
                                                           <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                           <div class="dropdown-menu" style="overflow:hidden;">
                                                               <a  class="dropdown-item" href="{{url("content/".$alurPenyerahan->id_alur_penyerahan."/edit-alurpenyerahan")}}">Edit</a>
                                                               <a class="dropdown-item" data-toggle="modal" data-target="#deleteAlurPenyerahanModal{{$alurPenyerahan->id_alur_penyerahan}}" href="#">Delete</a>
                                                            </div>                                                          
                                                        </td>
                                                    </tr>  
                                                    @endforeach
                                                    
                                         
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="informasipelayanan" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                         @if ($cekContentInformasiPelayanan == 0)
                                         <a href="{{url('content/create-informasipelayanan')}}"class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a> 
                                         @endif
                                      
                                          
                                          
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Pembukaan Pendaftaran</th>
                                                        <th>Tempat Layanan Putra</th>
                                                        <th>Tempat Layanan Putri</th>
                                                        <th>Tanggal Verifikasi Berkas</th>
                                                        <th>Tempat Verifikasi Berkas</th>
                                                        <th>Waktu Pelayanan Pagi</th>
                                                        <th>Waktu Pelayanan Siang</th>
                                                        <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                      
                                            @foreach ($dataAllInformasiPelayanan as $informasiPelayanan)
                                                
                                            <tr>
                                                <td>{{$informasiPelayanan->dari_tanggal_pembukaan_pendaftaran??'-'}} - {{$informasiPelayanan->sampai_tanggal_pembukaan_pendaftaran??'-'}} </td>
                                                <td>{{$informasiPelayanan->layanan_putra??'-'}}</td>
                                                <td>{{$informasiPelayanan->layanan_putri??'-'}}</td>
                                                <td>{{$informasiPelayanan->dari_tanggal_verifikasi_berkas??'-'}} - {{$informasiPelayanan->sampai_tanggal_verifikasi_berkas??'-'}}</td>
                                                <td>{{$informasiPelayanan->tempat_verifikasi_berkas??'-'}}</td>
                                                <td>{{$informasiPelayanan->dari_pelayanan_waktu_pagi??'-'}} - {{$informasiPelayanan->sampai_pelayanan_waktu_pagi??'-'}}</td>
                                                       <td>{{$informasiPelayanan->dari_pelayanan_waktu_siang??'-'}} - {{$informasiPelayanan->sampai_pelayanan_waktu_siang??'-'}}</td>
                                                       <td>
                                                           <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                           <div class="dropdown-menu" style="overflow:hidden;">
                                                               <a  class="dropdown-item" href="{{url("content/".$informasiPelayanan->id_informasi_pelayanan."/edit-informasipelayanan")}}">Edit</a>
                                                               <a class="dropdown-item" data-toggle="modal" data-target="#deleteInformasiPelayananModal{{$informasiPelayanan->id_informasi_pelayanan}}" href="#">Delete</a>
                                                            </div>                                                          
                                                        </td>
                                                    </tr>  
                                            @endforeach
                                           
                                                    
                                                    
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="imageinformasipelayanan" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="table-responsive p-4">
                                           @if ( $cekImageContentInformasiPelayanan == 0 ||  $cekImageContentInformasiPelayanan == null )
                                           <a data-toggle="modal" data-target="#uploadImageInformasiModal" href="#"class="btn btn-primary btn-sm ml-5">Upload image <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a>
                                           @endif
                                      
                                      
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                            <th>No</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                               
                                                       
                                           
                                                @foreach ($dataAllImageInformasiPelayanan as $imageInformasi)
                                                    
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <img width="50px" height="50px" src="{{asset('content_images/'.$imageInformasi->image_informasi) }}" alt="">
                                                    </td>
                                                    
                                                    <td>
                                                        <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                        <div class="dropdown-menu" style="overflow:hidden;">
                                                            <a  class="dropdown-item" data-toggle="modal" data-target="#editImageInformasiModal{{ $imageInformasi->id_image_informasi}}" href="#">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteImageInformasiModal{{ $imageInformasi->id_image_informasi}}" href="#">Delete</a>
                                                        </div>                                                          
                                                    </td>
                                                </tr>  
                                                @endforeach

                                                    
                                                </tbody>
                                                
                                            </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<!--**********************************
        modal upload image data syarat pendaftaran - management content first
        ***********************************-->
        
        <div class="modal fade bd-example-modal-lg formModal" id="uploadImageSyaratModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Image Syarat Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/store-image-syaratpendaftaran")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image_syarat_pendaftaran">Image<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" value="{{old('image_syarat_pendaftaran')}}" class="form-control @error('image_syarat_pendaftaran') is-invalid @enderror" id="val-name" name="image_syarat_pendaftaran" placeholder="Masukkan Title Syarat Pendaftaran..">
                                        @error('image_syarat_pendaftaran')
                                        <div class="form-text text-danger">{{$message}}.</div>
                                      @enderror
                                    </div>
                                </div>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!--**********************************
            modal upload image data syarat pendaftaran - management content end
        ***********************************-->
        <!--**********************************
        modal edit upload image data syarat pendaftaran - management content first
        ***********************************-->
        @foreach ($dataAllImageSyaratPendaftaran as $imageSyarat)
        <div class="modal fade bd-example-modal-lg formModal" id="editImageSyaratModal{{$imageSyarat->id_image_syarat}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Image Syarat Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/update-image-syaratpendaftaran/".$imageSyarat->id_image_syarat)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image_syarat_pendaftaran">Image<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" value="{{old('image_syarat_pendaftaran')}}" class="form-control @error('image_syarat_pendaftaran') is-invalid @enderror" id="val-name" name="image_syarat_pendaftaran" placeholder="Masukkan Title Syarat Pendaftaran..">
                                        @error('image_syarat_pendaftaran')
                                        <div class="form-text text-danger">{{$message}}.</div>
                                      @enderror
                                    </div>
                                </div>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal edit upload image data syarat pendaftaran - management content end
        ***********************************-->
        <!--**********************************
        modal delete upload image data syarat pendaftaran - management content first
        ***********************************-->
        
        @foreach ($dataAllImageSyaratPendaftaran as $imageSyarat)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteImageSyaratModal{{$imageSyarat->id_image_syarat}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Image Syarat Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/image-syaratpendaftaran/".$imageSyarat->id_image_syarat)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete upload image data syarat pendaftaran - management content end
        ***********************************-->

        <!--**********************************
        modal upload image data informasi pendaftaran - management content first
        ***********************************-->
        
        <div class="modal fade bd-example-modal-lg formModal" id="uploadImageInformasiModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Image Informasi Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/store-image-informasipelayanan")}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image_informasi_pelayanan">Image<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" value="{{old('image_informasi_pelayanan')}}" class="form-control @error('image_informasi_pelayanan') is-invalid @enderror" id="val-name" name="image_informasi_pelayanan" placeholder="Masukkan Title Syarat Pendaftaran..">
                                        @error('image_informasi_pelayanan')
                                        <div class="form-text text-danger">{{$message}}.</div>
                                      @enderror
                                    </div>
                                </div>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">upload</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!--**********************************
        modal upload image data informasi pendaftaran - management content end
        ***********************************-->

                <!--**********************************
        modal edit image data informasi pendaftaran - management content first
        ***********************************-->
        @foreach ( $dataAllImageInformasiPelayanan as $imageInformasi)
            
        <div class="modal fade bd-example-modal-lg formModal" id="editImageInformasiModal{{ $imageInformasi->id_image_informasi}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Image Informasi Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url('/content/update-image-informasipelayanan/'.$imageInformasi->id_image_informasi)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-image_informasi_pelayanan">Image<span class="text-danger"></span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" value="{{old('image_informasi_pelayanan')}}" class="form-control @error('image_informasi_pelayanan') is-invalid @enderror" id="val-name" name="image_informasi_pelayanan" placeholder="Masukkan Title Syarat Pendaftaran..">
                                        @error('image_informasi_pelayanan')
                                        <div class="form-text text-danger">{{$message}}.</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--**********************************
        modal edit image data informasi pendaftaran - management content end
        ***********************************-->

                <!--**********************************
        modal delete upload image data informasi pelayanan - management content first
        ***********************************-->
        
        @foreach ($dataAllImageInformasiPelayanan as $imageInformasi)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteImageInformasiModal{{$imageInformasi->id_image_informasi}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Image Informasi Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/image-informasipelayanan/".$imageInformasi->id_image_informasi)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete upload image data informasi pelayanan - management content end
        ***********************************-->

    <!--**********************************
        modal delete data general - management content first
        ***********************************-->
        
        @foreach ($dataAllGeneral as $general)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteGeneralModal{{$general->id_content}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data General</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/general/".$general->id_content)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete data general - management content end
        ***********************************-->
    <!--**********************************
        modal delete data alur pendaftaran - management content first
        ***********************************-->
        
        @foreach ($dataAllAlurPendaftaran as $alurPendaftaran)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteAlurPendaftaranModal{{$alurPendaftaran->id_alur_pendaftaran}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data Alur Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/alurpendaftaran/".$alurPendaftaran->id_alur_pendaftaran)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete data alur pendaftaran - management content end
        ***********************************-->

        <!--**********************************
        modal delete data syarat pendaftaran - management content first
        ***********************************-->
        
        @foreach ($dataAllSyaratPendaftaran as $syaratPendaftaran)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteSyaratPendaftaranModal{{$syaratPendaftaran->id_syarat_pendaftaran}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data Syarat Pendaftaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/syaratpendaftaran/".$syaratPendaftaran->id_syarat_pendaftaran)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete data syarat pendaftaran - management content end
        ***********************************-->


          <!--**********************************
        modal delete data alur penyerahan - management content first
        ***********************************-->
        
        @foreach ($dataAllAlurPenyerahan as $alurPenyerahan)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteAlurPenyerahanModal{{$alurPenyerahan->id_alur_penyerahan}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data Alur Penyerahan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/alurpenyerahan/".$alurPenyerahan->id_alur_penyerahan)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete data alur penyerahan - management content end
        ***********************************-->

            <!--**********************************
        modal delete data informasi pelayanan - management content first
        ***********************************-->
        
        @foreach ($dataAllInformasiPelayanan as $informasiPelayanan)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteInformasiPelayananModal{{$informasiPelayanan->id_informasi_pelayanan}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Data Informasi Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/content/informasipelayanan/".$informasiPelayanan->id_informasi_pelayanan)}}" method="POST">
                                @csrf
                                @method('delete')
                                <h5>Anda Yakin Akan Menghapus?</h5>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal delete data informasi pelayanan - management content end
        ***********************************-->




@endsection