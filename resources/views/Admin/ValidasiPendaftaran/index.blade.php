@extends('Layout.main')
@section('breadcrumb1','Validasi')
@section('breadcrumb2','Data Calon Pendaftaran')
@section('content')
<div class="p-t-15">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Data Status Validasi</h4>
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
                                    <td>{{$pendaftaran['calon_santris']['tanggal_daftar']??$pendaftaran['created_at']}}</td>
                                    <td>{{$pendaftaran['calon_santris']['nama_lengkap_santri']??$pendaftaran['name']}}</td>
                                    <td>{{$pendaftaran['calon_santris']['jenis_kelamin_santri']??'-'}}</td>
                                    <td>{{$pendaftaran['calon_santris']['jenjang_pendidikan']??'-'}}</td>
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

<!--**********************************
            validasi start
        ***********************************-->
        @foreach ($allPendaftaran as $index => $pendaftaran) 
<div class="modal fade validasiModal{{$pendaftaran['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Status Validasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url("/validasi-pendaftaran/".$pendaftaran['id_user'])}}" method="POST">
                    @csrf
                <fieldset class="form-group">
                    <div class="row">
                        <label class="col-form-label col-sm-2 pt-0">Status</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="updateStatusValidasi" value="in_progress" {{$pendaftaran['status_validasi']['nama_status_validasi'] == 'in_progress'?'checked':''}} >
                                <label class="form-check-label">In_progress</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="updateStatusValidasi" value="completed" {{$pendaftaran['status_validasi']['nama_status_validasi'] == 'completed'?'checked':''}}>
                                <label class="form-check-label">Completed</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach
<!--**********************************
            validasi end
        ***********************************-->
@endsection