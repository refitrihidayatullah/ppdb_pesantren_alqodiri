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
      <header>Login</header>
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
      <form action="{{url('/login')}}" method="POST">
        @csrf
        <div class="form first">
            <div class="details personal">
              <span class="title">LOGIN AKUN</span>
              <div class="fields">
                <div class="input-fields">
                  <label for="">Email / No Hp</label>
                  <input class="@error('login') is-invalid @enderror" type="text" name="login" placeholder="Masukkan Email/ no hp anda.."  />
                  @error('login')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
                <div class="input-fields">
                  <label for="">Password</label>
                  <input class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Masukkan password.."  />
                  @error('password')
                  <div class="form-text text-danger">{{$message}}.</div>
                @enderror
                </div>
              </div>
            </div>
            <a class="belum_punya_akun" href="{{url('/register')}}">Belum punya akun? klik disini</a>
            <button class="nextBtn" type="submit">
                <span class="btnText">Masuk</span>
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
