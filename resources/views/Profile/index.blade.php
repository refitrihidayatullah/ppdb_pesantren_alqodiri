@extends('Layout.main')
@section('breadcrumb1','Profile')
@section('breadcrumb2','Profile')
@section('content')
<div class="row">
<div style="width:100%;" class="d-flex justify-content-center">
    <div class="col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center mb-4">
                    @if ($profiles->image)
                        @if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin")
                        <img class="mr-3" src="{{asset('panitia_images/'.$profiles->image)}}" width="80" height="80" alt="">                           
                        @endif
                        @if (Auth::user()->level == "calonsantri")
                        <img class="mr-3" src="{{asset('calon_santri_images/'.$profiles->image)}}" width="80" height="80" alt="">
                        @endif
                    @else
                    <img class="mr-3" src="{{asset('images/user.png')}}" width="80" height="80" alt="">
                    @endif
                    <div class="media-body">
                        <h3 class="mb-0">{{$profiles->name??'-'}}</h3>
                        <p class="text-muted mb-0">{{$profiles->level??'-'}}</p>
                    </div>
                </div>
                
                <div class="row mb-5">

                    <div class="col-12 text-center mb-2">
                        <form action="{{url('/profile-changeimages')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button id="btnchangeimage" type="button" class="btn mb-1 btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Upload Foto</button>
                            <input style="display: none" name="image_profile" id="btnchangeimages" type="file">
                            <button type="submit" id="buttonImageUpload" class="btn btn-success" style="border-radius:1.5rem;display:none;">Submit</button>
                        </form>
                    </div>
                    <div class="col-12 text-center">
                        <a data-toggle="modal" data-target="#changePasswordUser{{$profiles->id_user}}" href="#" class="btn btn-danger px-5">Ganti Password</a>
                    </div>
                </div>
    
                {{-- <h4>About Me</h4>
                <p class="text-muted">Hi, I'm Pikamy, has been the industry standard dummy text ever since the 1500s.</p> --}}
                <ul class="card-profile__info">
                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>{{$profiles->no_hp??'-'}}</span></li>
                    <li><strong class="text-dark mr-4">Email</strong> <span>{{$profiles->email??'-'}}</span></li>
                </ul>
            </div>
        </div>  
    </div>
</div>
</div>

    <!--**********************************
        modal change password users  - profile users first
        ***********************************-->
    <div class="modal fade bd-example-modal-lg formModal" id="changePasswordUser{{$profiles->id_user}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ChangePassword</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form p-4">
                        <form action="{{url("/profile-changepassword")}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>new password</label>
                                    <input type="password" required name="passwordNew" value="{{old('passwordNew')}}" class="form-control @error('passwordNew') is-invalid @enderror" placeholder="masukkan new password..">
                                    @error('passwordNew')
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
        modal change password users - profile users end
    ***********************************-->
    <script>
        // ketika button diklik akan merubah type menjadi file
        document.getElementById('btnchangeimage').addEventListener('click',()=>{
            document.getElementById('btnchangeimages').click();
        });
        // ketika button sudah ada image maka button submite akan muncul
        document.getElementById('btnchangeimages').addEventListener('change',function(){
            var btnSubmit = document.getElementById('buttonImageUpload');
            if(this.files && this.files.length > 0)
            {
                btnSubmit.style.display = 'inline-block';
            }else{
                btnSubmit.style.display = 'none';
            }
        });

    </script>
@endsection