<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/mycss.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>PPDB Pesantren Alqodiri</title>
  </head>
  <body>
    <!-- nav first -->
    <header>
      <nav>
        <div class="logo">
          <img src="{{asset('assets/images/img/logo_aqj.png')}}" alt="logo_pesantren" />
          <span>PSB PP Alqodiri Jember</span>
        </div>
        <div class="authentaticate">
          <a href="{{url('/login')}}" class="">Login</a>
          <a href="{{url('/register')}}" class="btn__success">Daftar Sekarang!</a>
        </div>
      </nav>
    </header>
    <!-- nav end -->
    <!-- main first -->
    <main>
      <div class="hero">
        <div class="container">
          <div class="hero__section">
            <div class="hero__section__wrapper">
              <div class="logo__hero">
                <img src="{{asset('assets/images/img/logo_aqj.png')}}" alt="" />
              </div>
              <div class="data__hero">
                <div class="title__hero">
                  <span>{{$dataGeneral->title_web??'-'}}</span>
                </div>
                <div class="subtitle__hero">
                  <span>{{$dataGeneral->sub_title_web??'-'}}</span>
                </div>
                @php
                    use Carbon\Carbon;
                @endphp
                <div class="description__hero">
                  <p>
                    {{$dataGeneral->data_title_web??'-'}}
                  </p>
                  <span>tahun ajaran
                    
                    {{ $dataGeneral && $dataGeneral->dari_tahun_ajaran_web ? Carbon::parse($dataGeneral->dari_tahun_ajaran_web)->format('Y') : '-' }}
                    - 
                    {{ $dataGeneral && $dataGeneral->sampai_tahun_ajaran_web ? Carbon::parse($dataGeneral->sampai_tahun_ajaran_web)->format('Y') : '-' }}
                  </span>
                  </div>
                <a href="{{url('/register')}}">Daftar Sekarang!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- alur pendaftaran online first -->
      <div class="section__alur__pendaftaran">
        <div class="container">
          <div class="title">
            <p>alur pendaftaran <span>online</span></p>
          </div>
          <div class="wrapper__alur__pendaftaran">
            <div class="garis"></div>

            @foreach ($dataAlurPendaftaran as $alurPendaftaran)
                
            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>1</span>
                </div>
                <div class="header__title">
                  <span>{{$alurPendaftaran->title_alur_pendaftaran_online??'-'}}</span>
                </div>
              </div>
              <div class="content__card">
                <p>
                 {{$alurPendaftaran->sub_title_alur_pendaftaran_online??'-'}}
                </p>
              </div>
            </div>

            @endforeach


          </div>
        </div>
      </div>
      <!-- alur pendaftaran online end -->
      <!-- syarat pendaftaran first -->
      <div class="section__syarat__pendaftaran">
        <div class="container">
          <div class="wrapper__syarat">
            <div class="content__syarat">
              <div class="title__syarat">
                <p><span>syarat</span> pendaftaran</p>
              </div>
              <div class="subtitle__syarat">
                <p>
                  Untuk memenuhi persyaratan pendaftaran santri baru, perlu
                  beberapa berkas yang harus disiapkan:
                </p>
              </div>
              <div class="data__syarat">
                <ul>
                  @foreach ($dataSyaratPendaftaran as $syaratPendaftaran)
                      
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span>{{$syaratPendaftaran->title_syarat_pendaftaran??'-'}}</span>
                      <p>{{$syaratPendaftaran->sub_title_syarat_pendaftaran??'-'}}</p>
                    </div>
                  </li>
                    @endforeach
      

                </ul>
              </div>
            </div>
            <div class="content__syarat__image">
              <img src="{{$dataImageSyaratPendaftaran?asset('content_images/'.$dataImageSyaratPendaftaran->image_syarat):asset('assets/images/img/pendaftaran.jpg')}}" alt="pendaftaran" />
            </div>
          </div>
        </div>
      </div>
      <!-- syarat pendaftaran end -->

      <!-- alur penyerahan santri first -->
      <div class="section__penyerahan__santri">
        <div class="container">
          <div class="title">
            <p><span>alur</span> penyerahan santri</p>
          </div>
          <div class="wrapper__penyerahan__santri">
            @foreach ( $dataAlurPenyerahan as $alurPenyerahan)
                
            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>{{$alurPenyerahan->title_alur_penyerahan_santri??'-'}}</span>
                </div>
                <div class="number__santri">
                  <span>1</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                 {{$alurPenyerahan->sub_title_alur_penyerahan_santri??'-'}}
                </p>
              </div>
            </div>
            @endforeach


          </div>
        </div>
      </div>
      <!-- alur penyerahan santri end -->
      <!-- informasi pelayanan first -->
      <div class="section__informasi__pelayanan">
        <div class="container">
          <div class="wrapper__informasi__pelayanan">
            <div class="content__informasi__pelayanan__image">
              <img
                src="{{$dataImageInformasiPelayanan ? asset('content_images/'.$dataImageInformasiPelayanan->image_informasi):asset('assets/images/img/pendaftaran.jpg')}}"
                alt="informasi pelayanan pendaftaran"
              />
            </div>

            <div class="content__informasi__pelayanan">
              <div class="title__informasi__pelayanan">
                <p><span>informasi</span> pelayanan pendaftaran</p>
              </div>

              <div class="accordion__wrapper">
                <div class="accordion">
                  <div class="accordion__heading">
                    <h3>Pembukaan Pendaftaran & Kantor Layanan:</h3>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="accordion__content">
                    <p>Tanggal:</p>
                    <span>{{$dataInformasiPelayanan && $dataInformasiPelayanan->dari_tanggal_pembukaan_pendaftaran ? Carbon::parse($dataInformasiPelayanan->dari_tanggal_pembukaan_pendaftaran)->format('d-M-Y'):'-'}} ~ {{$dataInformasiPelayanan && $dataInformasiPelayanan->sampai_tanggal_pembukaan_pendaftaran ? Carbon::parse($dataInformasiPelayanan->sampai_tanggal_pembukaan_pendaftaran)->format('d-M-Y'):'-'}}</span>
                    <p>Layanan Putra:</p>
                    <span> {{$dataInformasiPelayanan->layanan_putra??'-'}} </span>
                    <p>Layanan Putri:</p>
                    <span> {{$dataInformasiPelayanan->layanan_putri??'-'}}</span>
                  </div>
                </div>

                <div class="accordion">
                  <div class="accordion__heading">
                    <h3>Penerimaan Satu Atap & Verifikasi Berkas:</h3>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="accordion__content">
                    <p>Tanggal:</p>
                    <span>{{$dataInformasiPelayanan && $dataInformasiPelayanan->dari_tanggal_verifikasi_berkas ? Carbon::parse($dataInformasiPelayanan->dari_tanggal_verifikasi_berkas)->format('d-M-Y'):'-'}} ~ {{$dataInformasiPelayanan && $dataInformasiPelayanan->sampai_tanggal_verifikasi_berkas ? Carbon::parse($dataInformasiPelayanan->sampai_tanggal_verifikasi_berkas)->format('d-M-Y'):'-'}}</span>
                    <p>Tempat Penerimaan:</p>
                    <span>{{$dataInformasiPelayanan->tempat_verifikasi_berkas??'-'}}</span>
                  </div>
                </div>
                <div class="accordion">
                  <div class="accordion__heading">
                    <h3>Waktu Pelayanan:</h3>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="accordion__content">
                    <p>Pagi:</p>
                    <span>{{$dataInformasiPelayanan && $dataInformasiPelayanan->dari_pelayanan_waktu_pagi ? Carbon::parse($dataInformasiPelayanan->dari_pelayanan_waktu_pagi)->format('H:i'):'-'}}~ {{$dataInformasiPelayanan && $dataInformasiPelayanan->sampai_pelayanan_waktu_pagi ? Carbon::parse($dataInformasiPelayanan->sampai_pelayanan_waktu_pagi)->format('H:i'):'-'}} WIB</span>
                    <p>Siang:</p>
                    <span>{{$dataInformasiPelayanan && $dataInformasiPelayanan->dari_pelayanan_waktu_siang ? Carbon::parse($dataInformasiPelayanan->dari_pelayanan_waktu_siang)->format('H:i'):'-'}} ~ {{$dataInformasiPelayanan && $dataInformasiPelayanan->sampai_pelayanan_waktu_siang ? Carbon::parse($dataInformasiPelayanan->sampai_pelayanan_waktu_siang)->format('H:i'):'-'}} WIB</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- informasi pelayanan end -->
      <!-- footer first -->
      <footer>
        <svg
          id="wave"
          style="transform: rotate(180deg); transition: 0.3s"
          viewBox="0 0 1440 100"
          version="1.1"
          xmlns="http://www.w3.org/2000/svg"
        >
          <defs>
            <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
              <stop
                stop-color="rgba(255, 242.673, 242.673, 1)"
                offset="0%"
              ></stop>
              <stop
                stop-color="rgba(253.043, 253.043, 253.043, 1)"
                offset="100%"
              ></stop>
            </linearGradient>
          </defs>
          <path
            style="transform: translate(0, 0px); opacity: 1"
            fill="url(#sw-gradient-0)"
            d="M0,30L10,33.3C20,37,40,43,60,45C80,47,100,43,120,40C140,37,160,33,180,28.3C200,23,220,17,240,25C260,33,280,57,300,70C320,83,340,87,360,78.3C380,70,400,50,420,46.7C440,43,460,57,480,65C500,73,520,77,540,65C560,53,580,27,600,13.3C620,0,640,0,660,10C680,20,700,40,720,53.3C740,67,760,73,780,71.7C800,70,820,60,840,56.7C860,53,880,57,900,55C920,53,940,47,960,40C980,33,1000,27,1020,23.3C1040,20,1060,20,1080,18.3C1100,17,1120,13,1140,15C1160,17,1180,23,1200,28.3C1220,33,1240,37,1260,45C1280,53,1300,67,1320,70C1340,73,1360,67,1380,56.7C1400,47,1420,33,1430,26.7L1440,20L1440,100L1430,100C1420,100,1400,100,1380,100C1360,100,1340,100,1320,100C1300,100,1280,100,1260,100C1240,100,1220,100,1200,100C1180,100,1160,100,1140,100C1120,100,1100,100,1080,100C1060,100,1040,100,1020,100C1000,100,980,100,960,100C940,100,920,100,900,100C880,100,860,100,840,100C820,100,800,100,780,100C760,100,740,100,720,100C700,100,680,100,660,100C640,100,620,100,600,100C580,100,560,100,540,100C520,100,500,100,480,100C460,100,440,100,420,100C400,100,380,100,360,100C340,100,320,100,300,100C280,100,260,100,240,100C220,100,200,100,180,100C160,100,140,100,120,100C100,100,80,100,60,100C40,100,20,100,10,100L0,100Z"
          ></path>
        </svg>
        <div class="container">
          <div class="wrapper__footer">
            <div class="alamat__footer">
              <div class="title__alamat__footer">
                <span>{{$dataGeneral->sub_title_web??'-'}}</span>
              </div>
              <div class="data__alamat">
                <ul>
                  <li>
                    <p>
                      {{$dataGeneral->alamat_pondok??'-'}}
                    </p>
                  </li>
                  <li>
                    <p>Telp: {{$dataGeneral->no_telp_pondok??'-'}}</p>
                  </li>
                  <li>
                    <p>Email: {{$dataGeneral->email_pondok??'-'}}</p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="sosmed__footer">
              <div class="sosmed__title__footer">
                <span>Sosial Media</span>
              </div>
              <ul>
                <li>
                  <i class="fa-brands fa-facebook"></i>
                  <a
                    href="{{$dataGeneral->facebook_pondok??'-'}}"
                    target="_blank"
                    >Facebook</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-square-instagram"></i>
                  <a
                    href="{{$dataGeneral->instagram_pondok??'-'}}"
                    target="_blank"
                    >Instagram</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-youtube"></i>
                  <a
                    href="{{$dataGeneral->youtube_pondok??'-'}}"
                    target="_blank"
                    >Youtube</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-tiktok"></i>
                  <a
                    href="{{$dataGeneral->tiktok_pondok??'-'}}"
                    target="_blank"
                    >Tiktok</a
                  >
                </li>
              </ul>
            </div>
            <div class="contact_footer">
              <div class="contact__title__footer">
                <span>Contact Us</span>
              </div>
              <p>{{$dataGeneral->no_telp_pondok??'-'}} (Layanan Umum)</p>
            </div>
          </div>
        </div>
        <div class="footer__copyright">
          <span>
            © Pondok Pesantren Alqodiri Jember {{Carbon::now()->format('Y')}} | Developer By
            <a target="_blank" href="https://refitrihidayatullah.github.io/"
              >Refi Tri Hidayatullah</a
            >
          </span>
        </div>
      </footer>
      <!-- footer end -->
    </main>

    <!-- main end -->

    <!-- script first -->
    <script src="{{asset('assets/js/myjs.js')}}"></script>
    <!-- script emd -->
  </body>
</html>
