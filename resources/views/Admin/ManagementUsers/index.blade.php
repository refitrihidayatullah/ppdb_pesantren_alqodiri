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
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#logactivity">Log Activity</a>
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
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($dataAllUsers as $allUsers)    
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$allUsers->name??''}}</td>
                                                            <td>{{$allUsers->email??''}}</td>
                                                            <td>{{$allUsers->no_hp??''}}</td>
                                                            <td>
                                                                @if ($allUsers->level === "superadmin")                                                                  
                                                                <span class="badge badge-dark">{{$allUsers->level??''}}</span>
                                                                @elseif($allUsers->level === "admin")
                                                                <span class="badge badge-primary">{{$allUsers->level??''}}</span>
                                                                @else            
                                                                <span class="badge badge-success">{{$allUsers->level??''}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordModal{{$allUsers->id_user}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="{{url("/users/".$allUsers->id_user."/edit")}}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserModal{{$allUsers->id_user}}" href="#">Delete</a>
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
                                                        @foreach ($dataAllPanitia as $allPanitia)    
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$allPanitia->name??''}}</td>
                                                            <td>{{$allPanitia->email??''}}</td>
                                                            <td>{{$allPanitia->no_hp??''}}</td>
                                                            <td>
                                                                @if ($allPanitia->level === "superadmin")                                                                  
                                                                <span class="badge badge-dark">{{$allPanitia->level??''}}</span>
                                                                @elseif($allPanitia->level === "admin")
                                                                <span class="badge badge-primary">{{$allPanitia->level??''}}</span>
                                                                @else            
                                                                <span class="badge badge-success">{{$allPanitia->level??''}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                            <button type="button" class="btn btn-sm mb-1 btn-warning" data-toggle="modal" data-target="#changePasswordPanitiaModal{{$allPanitia->id_user}}" data-placement="top" title="Change Password"><i class="fa-solid fa-key"></i></button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="
                                                                {{url("/users/".$allPanitia->id_user."/edit-panitia")}}">Edit</a>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteUserPanitiaModal{{$allPanitia->id_user}}" href="#">Delete</a>

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
                            <h4>This is contact title</h4>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="putriusers">
                        <div class="p-t-15">
                            <h4>This is message title</h4>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="logactivity">
                        <div class="p-t-15">
                            <h4>This is message title</h4>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
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
    <div class="modal fade bd-example-modal-lg formModal" id="deleteUserModal{{$allUsers->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Users</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/".$allUsers->id_user)}}" method="POST">
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
    <div class="modal fade bd-example-modal-lg formModal" id="deleteUserPanitiaModal{{$allPanitia->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Users Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/panitia/".$allPanitia->id_user)}}" method="POST">
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
        modal change password all users - management users first
    ***********************************-->
    @foreach ($dataAllUsers as $allUsers)
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordModal{{$allUsers->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/changepassword/".$allUsers->id_user)}}" method="POST">
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
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordPanitiaModal{{$allPanitia->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/users/changepassword-panitia/".$allPanitia->id_user)}}" method="POST">
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

@endsection