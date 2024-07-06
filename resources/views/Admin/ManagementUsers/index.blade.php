@extends('Layout.main')
@section('breadcrumb1','Management Users')
@section('breadcrumb2','Data Users')
@section('content')

<div class="col-md-12">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Data Users</h4>

            <!-- Nav tabs -->
            <div class="custom-tab-1">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#allusers">Semua Users</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#panitiausers">Users Panitia</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#putrausers">Users calon santri putra</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#putriusers">Users calon santri putri</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="allusers" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <a href="{{url('/users/create')}}"   class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa-solid fa-plus"></i></i></span></a>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Status</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataAllUsers as $index => $allUsers)   
                                                        <tr>
                                                            <td>{{$index +1 ??''}}</td>
                                                            <td>{{$allUsers['name']??''}}</td>
                                                            <td>{{$allUsers['email']??''}}</td>
                                                            <td>{{$allUsers['no_hp']??''}}</td>
                                                            <td>
                                                                @if ($allUsers['level'] === "superadmin")                                                                  
                                                                <span class="badge badge-dark">{{$allUsers['level']??''}}</span>
                                                                @elseif($allUsers['level'] === "admin")
                                                                <span class="badge badge-primary">{{$allUsers['level']??''}}</span>
                                                                @else            
                                                                <span class="badge badge-success">{{$allUsers['level']??''}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($allUsers['status_validasi']['nama_status_validasi'] === "accessDenied")                                                                  
                                                                <span class="badge badge-dark">{{$allUsers['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @elseif($allUsers['status_validasi']['nama_status_validasi'] === "pending")
                                                                <span class="badge badge-warning">{{$allUsers['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @elseif($allUsers['status_validasi']['nama_status_validasi'] === "inProgress")
                                                                <span class="badge badge-primary">{{$allUsers['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @else            
                                                                <span class="badge badge-success">{{$allUsers['status_validasi']['nama_status_validasi']??''}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                                <div class="dropdown-menu" style="overflow:hidden;"><a  class="dropdown-item" href="{{url("/users/".$allUsers['id_user']."/edit")}}">Edit</a>
                                                                    @if ($allUsers['status_validasi']['nama_status_validasi'] === 'in_progress' )                       
                                                                    <a class="dropdown-item" href="{{url("/form-pendaftaran/".$allUsers['id_user']."/edit")}}">Edit Form Pendaftaran</a>
                                                                    @endif
                                                                    @if ($allUsers['status_validasi']['nama_status_validasi'] === 'pending' )                       
                                                                    <a class="dropdown-item" href="{{url('/form-pendaftaran')}}">Isi Form Pendaftaran</a>
                                                                    @endif

                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserModal{{$allUsers['id_user']}}" href="#">Delete</a>
                                                                </div>
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordModal{{$allUsers['id_user']}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Status</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
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
                    <div class="tab-pane fade" id="panitiausers">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <a href="{{url('/users/create-panitia')}}" class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataAllPanitia as $index => $allPanitia)    
                                                        <tr>
                                                            <td>{{$index +1 ??''}}</td>
                                                            <td>{{$allPanitia['name']??''}}</td>
                                                            <td>{{$allPanitia['email']??''}}</td>
                                                            <td>{{$allPanitia['no_hp']??''}}</td>
                                                            <td>
                                                                @if ($allPanitia['level'] === "superadmin")                                                                  
                                                                <span class="badge badge-dark">{{$allPanitia['level']??''}}</span>
                                                                @elseif($allPanitia['level'] === "admin")
                                                                <span class="badge badge-primary">{{$allPanitia['level']??''}}</span>
                                                                @else            
                                                                <span class="badge badge-success">{{$allPanitia['level']??''}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordPanitiaModal{{$allPanitia['id_user']}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="
                                                                {{url("/users/".$allPanitia['id_user']."/edit-panitia")}}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserPanitiaModal{{$allPanitia['id_user']}}" href="#">Delete</a>

                                                            </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
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
                    <div class="tab-pane fade" id="putrausers">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <a href="{{url('/users/create-user-putra')}}" class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataUserPutra as $index => $userPutra)
                                                            
                                                        <tr>
                                                            <td>{{$index +1??''}}</td>
                                                            <td>{{$userPutra['name']??''}}</td>
                                                            <td>{{$userPutra['email']??''}}</td>
                                                            <td>{{$userPutra['no_hp']??''}}</td>
                                                            <td>{{$userPutra['calon_santris']['jenis_kelamin_santri']??''}}</td>
                                                            <td>       
                                                                <span class="badge badge-success">{{$userPutra['status_validasi']['nama_status_validasi']??''}}</span>
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                           
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordPutraModal{{$userPutra['id_user']}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="
                                                                {{url("/users/".$userPutra['id_user']."/edit-putra")}}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserPutraModal{{$userPutra['id_user']}}" href="#">Delete</a>
                                                                @if ($userPutra['status_validasi']['nama_status_validasi'] === 'in_progress' )                       
                                                                <a class="dropdown-item" href="{{url("/form-pendaftaran/".$userPutra['id_user']."/edit")}}">Edit Form Pendaftaran</a>
                                                                @endif
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                           
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
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
                    <div class="tab-pane fade" id="putriusers">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <a href="{{url('/users/create-user-putri')}}" class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataUserPutri as $index => $userPutri)
                                                            
                                                        <tr>
                                                            <td>{{$index +1??''}}</td>
                                                            <td>{{$userPutri['name']??''}}</td>
                                                            <td>{{$userPutri['email']??''}}</td>
                                                            <td>{{$userPutri['no_hp']??''}}</td>
                                                            <td>{{$userPutri['calon_santris']['jenis_kelamin_santri']??''}}</td>
                                                            <td>       
                                                                <span class="badge badge-success">{{$userPutri['status_validasi']['nama_status_validasi']??''}}</span>
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                           
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordPutriModal{{$userPutri['id_user']}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="
                                                                {{url("/users/".$userPutri['id_user']."/edit-putri")}}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserPutriModal{{$userPutri['id_user']}}" href="#">Delete</a>
                                                                @if ($userPutri['status_validasi']['nama_status_validasi'] === 'in_progress' )                       
                                                                <a class="dropdown-item" href="{{url("/form-pendaftaran/".$userPutri['id_user']."/edit")}}">Edit Form Pendaftaran</a>
                                                                @endif
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                           
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No Hp</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Status Validasi</th>
                                                            <th>Action</th>
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
        modal delete data all users - management users first
    ***********************************-->
    @foreach ($dataAllUsers as $allUsers)
    <div class="modal fade bd-example-modal-lg formModal" id="deleteUserModal{{$allUsers['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Users</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/".$allUsers['id_user'])}}" method="POST">
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
        modal delete data all users - management users end
    ***********************************-->


        <!--**********************************
        modal delete data users panitia - management users first
    ***********************************-->
    @foreach ($dataAllPanitia as $allPanitia)
    <div class="modal fade bd-example-modal-lg formModal" id="deleteUserPanitiaModal{{$allPanitia['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Users Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/panitia/".$allPanitia['id_user'])}}" method="POST">
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
        modal delete data users panitia - management users end
    ***********************************-->

    
    <!--**********************************
        modal delete data users Putra - management users first
        ***********************************-->
        
    @foreach ($dataUserPutra as $index => $userPutra)
    <div class="modal fade bd-example-modal-lg formModal" id="deleteUserPutraModal{{$userPutra['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Users Putra</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/putra/".$userPutra['id_user'])}}" method="POST">
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
        modal delete data users Putra - management users end
    ***********************************-->

    <!--**********************************
        modal delete data users Putri - management users first
        ***********************************-->
        
        @foreach ($dataUserPutri as $index => $userPutri)
        <div class="modal fade bd-example-modal-lg formModal" id="deleteUserPutriModal{{$userPutri['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Users Putri</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/users/putri/".$userPutri['id_user'])}}" method="POST">
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
            modal delete data users Putri - management users end
        ***********************************-->

     <!--**********************************
        modal change password all users - management users first
    ***********************************-->
    @foreach ($dataAllUsers as $allUsers)
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordModal{{$allUsers['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/changepassword/".$allUsers['id_user'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>new password</label>
                                    <input type="password" required name="password_new" value="{{old('password_new')}}" class="form-control @error('password_new') is-invalid @enderror" placeholder="masukkan new password..">
                                    @error('password_new')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>

                            </div>
                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
      <!--**********************************
        modal change password all users - management users end
    ***********************************-->


    <!--**********************************
        modal change password users panitia - management users first
        ***********************************-->
        @foreach ($dataAllPanitia as $allPanitia)
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordPanitiaModal{{$allPanitia['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/changepassword-panitia/".$allPanitia['id_user'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>new password</label>
                                    <input type="password" required name="passwordPanitia_new" value="{{old('passwordPanitia_new')}}" class="form-control @error('passwordPanitia_new') is-invalid @enderror" placeholder="masukkan new password..">
                                    @error('passwordPanitia_new')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>

                            </div>
                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
      <!--**********************************
        modal change password users panitia - management users end
    ***********************************-->

    <!--**********************************
        modal change password users putra - management users first
        ***********************************-->
    @foreach ($dataUserPutra as $index => $userPutra)
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordPutraModal{{$userPutra['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword Putra</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/changepassword-putra/".$userPutra['id_user'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>new password</label>
                                    <input type="password" required name="passwordPutra_new" value="{{old('passwordPutra_new')}}" class="form-control @error('passwordPutra_new') is-invalid @enderror" placeholder="masukkan new password..">
                                    @error('passwordPutra_new')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>

                            </div>
                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
      <!--**********************************
        modal change password users putra - management users end
    ***********************************-->
     <!--**********************************
        modal change password users putri - management users first
        ***********************************-->
        @foreach ($dataUserPutri as $index => $userPutri)
        <div class="modal fade bd-example-modal-lg formModal" id="changePasswordPutriModal{{$userPutri['id_user']}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ChangePassword Putri</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form p-4">
                            <form action="{{url("/users/changepassword-putri/".$userPutri['id_user'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label>new password</label>
                                        <input type="password" required name="passwordPutri_new" value="{{old('passwordPutri_new')}}" class="form-control @error('passwordPutri_new') is-invalid @enderror" placeholder="masukkan new password..">
                                        @error('passwordPutri_new')
                                        <div class="form-text text-danger">{{$message}}.</div>
                                      @enderror
                                    </div>
    
                                </div>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
          <!--**********************************
            modal change password users putri - management users end
        ***********************************-->

@endsection