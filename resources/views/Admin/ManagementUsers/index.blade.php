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
                <ul class="nav nav-tabs">
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
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="allusers" role="tabpanel">
                        <div class="p-t-15">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                                <button data-toggle="modal" data-target="#tambahUserModal"  class="btn btn-primary btn-sm">Add <span class="btn-icon-right"><i class="fa fa-plus"></i></span></button>
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
                                                            <td>1</td>
                                                            <td>{{$allUsers->name??''}}</td>
                                                            <td>{{$allUsers->email??''}}</td>
                                                            <td>{{$allUsers->no_hp??''}}</td>
                                                            <td>
                                                                <span class="badge badge-dark">{{$allUsers->level??''}}</span>
                                                            </td>
                                                            <td>
                                                            <button type="button" class="btn btn-sm mb-1 btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                                                            <div class="dropdown-menu"><a class="dropdown-item" href="#">Edit</a> <a class="dropdown-item" href="#">Delete</a>
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
                            <h4>This is profile title</h4>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
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
        modal tambah data users - management users first
    ***********************************-->
    <div class="modal fade bd-example-modal-lg formModal" id="tambahUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Users</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url('/users')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"" placeholder="masukkan nama calon santri..">
                                    @error('name')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"" placeholder="masukkan email anda..">
                                    @error('email')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No Hp</label>
                                    <input type="number" name="no_hp" value="{{old('no_hp')}}" class="form-control @error('no_hp') is-invalid @enderror"" placeholder="masukkan no hp anda..">
                                    @error('no_hp')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select id="inputState" name="level" id="level" class="form-control">
                                        <option value="">Pilih...</option>
                                        @foreach ($statusUser as $status)
                                        <option value="{{$status}}" {{ old('level') == {{$status}} ? 'selected' : '' }}>Calon Santri</option>
                                            
                                        @endforeach

                                        {{-- <option value="calonsantri" {{ old('level') == 'calonsantri' ? 'selected' : '' }}>Calon Santri</option>
                                        <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="superadmin" {{ old('level') == 'superadmin' ? 'selected' : '' }}>Super Admin</option> --}}
                                    </select>
                                    @error('level')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                    </div>
                                    
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"" placeholder="masukkan password..">
                                    @error('password')
                                    <div class="form-text text-danger">{{$message}}.</div>
                                  @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror"" placeholder="masukkan password">
                                    @error('password_confirm')
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
      <!--**********************************
        modal tambah data users - management users end
    ***********************************-->

@endsection