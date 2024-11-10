@extends('Layout.main')
@section('breadcrumb1','Management Content')
@section('breadcrumb2','Data Content')
@section('content')

<div class="col-md-12">
    <div class="card">
        @php
        use Carbon\Carbon;
        @endphp
        <div class="card-body">
            <h4 class="card-title">Data Validasi</h4>

            <!-- Nav tabs -->
            <div class="custom-tab-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
    
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#validasiAllUsers">Validasi All Users</a>
                    </li>

                    @if (Auth::user()->level === "superadmin" || (Auth::user()->level === "admin" && Auth::user()->jenkel === "laki-laki"))
                    <li class="nav-item"><a class="nav-link {{(Auth::user()->level == 'admin' && Auth::user()->jenkel == 'laki-laki') ? 'show':''}}" data-toggle="tab" href="#validasiAllPutra">Validasi Putra</a>
                    </li>
                    @endif
                    @if (Auth::user()->level === "superadmin" || (Auth::user()->level === "admin" && Auth::user()->jenkel === "perempuan"))
                    <li class="nav-item"><a class="nav-link {{(Auth::user()->level == 'admin' && Auth::user()->jenkel == 'perempuan') ? 'show':''}}" data-toggle="tab" href="#validasiAllPutri">Validasi Putri</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="validasiAllUsers" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
     
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                 
                                                        @foreach ($allPendaftaran as $index => $pendaftaran)   
                                                        <tr>
                                                            <td>{{$pendaftaran['calon_santris']['tanggal_daftar']?? Carbon::parse($pendaftaran['created_at'])->format('d M Y')}}</td>
                                                            <td>{{$pendaftaran['calon_santris']['nama_lengkap_santri']??$pendaftaran['name']}}</td>
                                                            <td>{{$pendaftaran['calon_santris']['jenis_kelamin_santri']??$pendaftaran['jenkel']??'-'}}</td>
                                                            <td>{{$pendaftaran['calon_santris']['jenjang_pendidikan']??'-'}}</td>
                                                            
                                                        @if (Auth::user()->level == "superadmin")
                                                            <td>
                                                                @if ($pendaftaran['status_validasi']['nama_status_validasi'] === "pending")                                                                  
                                                                <span class="badge badge-danger">{{$pendaftaran['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @elseif($pendaftaran['status_validasi']['nama_status_validasi'] === "in_progress")
                                                                <span class="badge badge-warning">{{$pendaftaran['status_validasi']['nama_status_validasi']??''}}</span>
                                                                <a href="#" type="button" data-toggle="modal" data-target=".validasiModal{{$pendaftaran['id_user']}}"><i class="fa-solid fa-pen-to-square"></i>ubah status</a>
                                                                @else
                                                                <span class="badge badge-success">{{$pendaftaran['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @endif
                                                            </td>
                                                        @else
                                                                <td>
                                                                    <p style="color:red;text-align:center">accessDenied</p>

                                                                </td>
                                                        @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="validasiAllPutra" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            
                                                        @foreach ($dataAllPutra as $index => $allPutra)   
                                                        <tr>
                                                            <td>{{$allPutra['calon_santris']['tanggal_daftar']?? Carbon::parse($allPutra['created_at'])->format('d M Y')}}</td>
                                                            <td>{{$allPutra['calon_santris']['nama_lengkap_santri']??$allPutra['name']}}</td>
                                                            <td>{{$allPutra['calon_santris']['jenis_kelamin_santri']??$allPutra['jenkel']??'-'}}</td>
                                                            <td>{{$allPutra['calon_santris']['jenjang_pendidikan']??'-'}}</td>
                                                            <td>
                                                                @if ($allPutra['status_validasi']['nama_status_validasi'] === "pending")                                                                  
                                                                <span class="badge badge-danger">{{$allPutra['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @elseif($allPutra['status_validasi']['nama_status_validasi'] === "in_progress")
                                                                    <span class="badge badge-warning">{{$allPutra['status_validasi']['nama_status_validasi']??''}}</span>
                                                                    <a href="#" type="button" data-toggle="modal" data-target=".validasiPutraModal{{$allPutra['id_user']}}"><i class="fa-solid fa-pen-to-square"></i>ubah status</a>
                                                                @else
                                                                <span class="badge badge-success">{{$allPutra['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                     
 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="validasiAllPutri" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                          
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                            
                                                        @foreach ($dataAllPutri as $index => $allPutri)   
                                                        <tr>
                                                            <td>{{$allPutri['calon_santris']['tanggal_daftar']?? Carbon::parse($allPutri['created_at'])->format('d M Y')}}</td>
                                                            <td>{{$allPutri['calon_santris']['nama_lengkap_santri']??$allPutri['name']}}</td>
                                                            <td>{{$allPutri['calon_santris']['jenis_kelamin_santri']??$allPutri['jenkel']??'-'}}</td>
                                                            <td>{{$allPutri['calon_santris']['jenjang_pendidikan']??'-'}}</td>
                                                            <td>
                                                                @if ($allPutri['status_validasi']['nama_status_validasi'] === "pending")                                                                  
                                                                <span class="badge badge-danger">{{$allPutri['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @elseif($allPutri['status_validasi']['nama_status_validasi'] === "in_progress")
                                                                    <span class="badge badge-warning">{{$allPutri['status_validasi']['nama_status_validasi']??''}}</span>
                                                                    <a href="#" type="button" data-toggle="modal" data-target=".validasiPutriModal{{$allPutri['id_user']}}"><i class="fa-solid fa-pen-to-square"></i>ubah status</a>
                                                                @else
                                                                <span class="badge badge-success">{{$allPutri['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Tanggal Daftar</th>
                                                            <th>Nama Santri</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Status Validasi</th>
                                                        </tr>
                                                    </tfoot>
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
        modal validasi all users  - management users first
        ***********************************-->
        @foreach ($allPendaftaran as $index => $pendaftaran) 
        <div class="modal fade bd-example-modal-lg formModal validasiModal{{$pendaftaran['id_user']}}" id="validasiModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Validasi Pendaftaran Users</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/validasi-pendaftaran/".$pendaftaran['id_user'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                        <div class="form-group">
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasi" value="in_progress"
                                                    {{$pendaftaran['status_validasi']['nama_status_validasi'] === "in_progress"? 'checked':''}}
                                                    > In Progress</label>
                                            </div>
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasi" value="completed"
                                                    {{$pendaftaran['status_validasi']['nama_status_validasi'] === "completed" ? 'checked':''}}
                                                    > Completed</label>
                                            </div>

                                        </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal validasi all users - management users end
        ***********************************-->

         <!--**********************************
        modal validasi putra users  - management users first
        ***********************************-->
        @foreach ($dataAllPutra as $index => $allPutra)
        <div class="modal fade bd-example-modal-lg formModal validasiPutraModal{{$allPutra['id_user']}}" id="validasiPutraModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Validasi Pendaftaran Users</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/validasi-pendaftaran-putra/".$allPutra['id_user'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                        <div class="form-group">
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasiPutra" value="in_progress"
                                                    {{$allPutra['status_validasi']['nama_status_validasi'] === "in_progress"? 'checked':''}}
                                                    > In Progress</label>
                                            </div>
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasiPutra" value="completed"
                                                    {{$allPutra['status_validasi']['nama_status_validasi'] === "completed" ? 'checked':''}}
                                                    > Completed</label>
                                            </div>

                                        </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal validasi putra users - management users end
        ***********************************-->

           <!--**********************************
        modal validasi putri users  - management users first
        ***********************************-->
        @foreach ($dataAllPutri as $index => $allPutri)  
        <div class="modal fade bd-example-modal-lg formModal validasiPutriModal{{$allPutri['id_user']}}" id="validasiPutriModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Validasi Pendaftaran Users</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/validasi-pendaftaran-putri/".$allPutri['id_user'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                        <div class="form-group">
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasiPutri" value="in_progress"
                                                    {{$allPutri['status_validasi']['nama_status_validasi'] === "in_progress"? 'checked':''}}
                                                    > In Progress</label>
                                            </div>
                                            <div class="radio mb-3">
                                                <label>
                                                    <input type="radio" name="updateStatusValidasiPutri" value="completed"
                                                    {{$allPutri['status_validasi']['nama_status_validasi'] === "completed" ? 'checked':''}}
                                                    > Completed</label>
                                            </div>

                                        </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal validasi putri users - management users end
        ***********************************-->



@endsection