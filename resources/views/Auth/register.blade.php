<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/registrasi.css')}}"/>
    <title>PPDB Pesantren Alqodiri</title>
  </head>
  <body>
    <div class="container">
      <header>Formulir Pendaftaran</header>
          <!-- first alert -->
     @if(Session::has('failed'))
     <div style="width: 50%" class="alert alert-danger alert-dismissible text-white mx-3" role="alert" id="myAlert">
      <span class="text-sm">Failed {{Session::get('failed')}}.</span>
     </div>
      @elseif(Session::has('success'))
     <div style="width: 50%" class="alert alert-success alert-dismissible text-white" role="alert" id="myAlert">
     <span class="text-sm text-white">Success {{Session::get('success')}}.</span>
     </div>
     @else
     @endif
    <!-- end alert -->
      <form action="{{url('/register')}}" method="POST">
        @csrf
        <div class="form first">
            <div class="details personal">
              <span class="title">Pendaftaran Akun</span>
              <div class="fields">
                <div class="input-fields">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="@error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Masukkan Nama anda.."  />
                  @error('name')
                    <div class="form-text text-danger">{{$message}}.</div>
                  @enderror
                </div>
                <div class="input-fields">
                  <label for="">Email</label>
                  <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Masukkan Email anda.."  />
                  @error('email')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
                <div class="input-fields">
                  <label for="">No Wa / No HP</label>
                  <input type="number" name="no_hp" class="@error('no_hp') is-invalid @enderror" value="{{old('no_hp')}}" placeholder="Masukkan nomer hp anda.."  />
                  @error('no_hp')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
                <div class="input-fields">
                  <label for="">Jenis Kelamin</label>
                 <select name="jenkel" id="jenkel" style="color:grey;" class="@error('jenkel') is-invalid @enderror">
                  <option value="">Pilih Jenis Kelamin..</option>
                  @foreach ($jeniskelamin as $jenkel)
                      <option value="{{$jenkel}}">{{$jenkel}}</option>
                  @endforeach
                 </select>
                  @error('jenkel')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
                <div class="input-fields">
                  <label for="">Password</label>
                  <input type="password"  name="password" class="@error('password') is-invalid @enderror" placeholder="Masukkan password.."  />
                  @error('password')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
                <div class="input-fields">
                  <label for="">Konfirmasi Password</label>
                  <input
                    type="password" name="password_confirm" class="@error('password_confirm') is-invalid @enderror"
                    placeholder="Masukkan password.."/>
                  @error('password_confirm')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
              </div>
            </div>
            <a class="belum_punya_akun" href="{{url('/login')}}">Sudah punya akun? klik disini</a>
            <button class="nextBtn" type="submit">
                <span class="btnText">Kirim</span>
                <i class="fa-solid fa-arrow-right"></i>
              </button>
      </form>
    </div>
    <script>
      // Ambil elemen alert
      var alertElement = document.getElementById('myAlert');
  
      // Tampilkan alert
      alertElement.style.display = 'block';
  
      // Setelah 3 detik, sembunyikan alert
      setTimeout(function() {
          alertElement.style.display = 'none';
      }, 3000); // 3000 milidetik = 3 detik
  </script>
  </body>
</html>
