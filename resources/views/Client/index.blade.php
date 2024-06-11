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
                  <span>Pendaftaran santri baru</span>
                </div>
                <div class="subtitle__hero">
                  <span>pondok pesantren alqodiri jember</span>
                </div>
                <div class="description__hero">
                  <p>
                    PP alqodiri jember boarding school for education and science
                  </p>
                  <span>tahun ajaran 2024 - 2025</span>
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
            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>1</span>
                </div>
                <div class="header__title">
                  <span>pembuatan akun</span>
                </div>
              </div>
              <div class="content__card">
                <p>
                  Mengisi formulir pembuatan akun untuk mendapatkan Nomor
                  Registrasi.
                </p>
              </div>
            </div>

            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>2</span>
                </div>
                <div class="header__title">
                  <span>Login & Melengkapi Data</span>
                </div>
              </div>
              <div class="content__card">
                <p>
                  Melengkapi data peserta didik, data orang tua / wali atau
                  mahrom khususnya santri putri.
                </p>
              </div>
            </div>

            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>3</span>
                </div>
                <div class="header__title">
                  <span>Mengunggah Berkas</span>
                </div>
              </div>
              <div class="content__card">
                <p>
                  Mengunggah berkas persyaratan dan berkas pendukung lainnya
                  yang berupa gambar / foto.
                </p>
              </div>
            </div>

            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>4</span>
                </div>
                <div class="header__title">
                  <span>Cetak Pendaftaran</span>
                </div>
              </div>
              <div class="content__card">
                <p>
                  Cetak atau simpan Nomor Registrasi sebagai bukti pendaftaran
                  untuk ditunjukkan ke petugas PSB.
                </p>
              </div>
            </div>

            <div class="card__alur__pendaftaran">
              <div class="header__card">
                <div class="header__number">
                  <span>5</span>
                </div>
                <div class="header__title">
                  <span>Menyerahkan bukti</span>
                </div>
              </div>
              <div class="content__card">
                <p>Menyerahkan bukti pendaftaran secara offline.</p>
              </div>
            </div>
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
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span>Photo Copy Akta Kelahiran Peserta Didik</span>
                    </div>
                  </li>
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span>Photo Copy KTP orang tua/wali</span>
                      <p>sebanyak 3 lembar</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span>Photo Copy Kartu Keluarga (KK)</span>
                      <p>sebanyak 3 lembar</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span>Photo Copy STL/SKHUN/Ijazah</span>
                      <p>sebanyak 3 lembar</p>
                    </div>
                  </li>
                  <li>
                    <div class="icon__syarat">
                      <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="data__syarat__content">
                      <span
                        >Surat Keterangan Sehat dari Fasilitas Kesehatan</span
                      >
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="content__syarat__image">
              <img src="{{asset('assets/images/img/pendaftaran.jpg')}}" alt="pendaftaran" />
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
            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>Konfirmasi Nomor Registrasi</span>
                </div>
                <div class="number__santri">
                  <span>1</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                  Menyerahkan Nomor Registrasi dan bukti pendaftaran online
                  kepada petugas PSB.
                </p>
              </div>
            </div>

            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>Ikrar Santri</span>
                </div>
                <div class="number__santri">
                  <span>2</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                  Melakukan Ikrar Santri dan kesediaan mengikuti aturan yang
                  ditetapkan oleh Pondok Pesantren Al Qodiri Jember.
                </p>
              </div>
            </div>

            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>Pengambilan Seragam</span>
                </div>
                <div class="number__santri">
                  <span>3</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                  Pengambilan seragam sesuai dengan pemilihan ukuran seragam
                  yang telah dipilih oleh pendaftar.
                </p>
              </div>
            </div>

            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>Sowan Pengasuh</span>
                </div>
                <div class="number__santri">
                  <span>4</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                  Penyerahan calon peserta didik oleh orangtua / wali kepada
                  pengasuh.
                </p>
              </div>
            </div>

            <div class="card__santri">
              <div class="card__content__santri">
                <div class="titles__santri">
                  <span>Asrama Santri</span>
                </div>
                <div class="number__santri">
                  <span>5</span>
                </div>
              </div>
              <div class="card__body__santri">
                <p>
                  Santri baru menempati asrama yang telah ditetepkan oleh
                  pengurus.
                </p>
              </div>
            </div>
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
                src="{{asset('assets/images/img/pendaftaran.jpg')}}"
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
                    <span>1 Maret ~ 8 Juli 2024</span>
                    <p>Layanan Putra:</p>
                    <span> Kantor Sekretariat Putra </span>
                    <p>Layanan Putri:</p>
                    <span> Kantor Sekretariat Putri</span>
                  </div>
                </div>

                <div class="accordion">
                  <div class="accordion__heading">
                    <h3>Penerimaan Satu Atap & Verifikasi Berkas:</h3>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="accordion__content">
                    <p>Tanggal:</p>
                    <span>3 juli ~ 8 Juli 2024</span>
                    <p>Tempat Penerimaan:</p>
                    <span>Aula II Pesantren, Lantai 3</span>
                  </div>
                </div>
                <div class="accordion">
                  <div class="accordion__heading">
                    <h3>Waktu Pelayanan:</h3>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="accordion__content">
                    <p>Pagi:</p>
                    <span> 08.00 ~ 12.00 WIB</span>
                    <p>Siang:</p>
                    <span>13.00 ~ 16.00 WIB</span>
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
                <span>pondok pesantren Al-Qodiri Jember</span>
              </div>
              <div class="data__alamat">
                <ul>
                  <li>
                    <p>
                      Jl. Manggar No.139A, Gebang Poreng Jember Jawa Timur,68117
                    </p>
                  </li>
                  <li>
                    <p>Telp: +62-821-4038-4613</p>
                  </li>
                  <li>
                    <p>Email: pesantren@alqodiri.net</p>
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
                    href="https://www.facebook.com/pp.alqodiri/?locale=id_ID"
                    target="_blank"
                    >Facebook</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-square-instagram"></i>
                  <a
                    href="https://www.instagram.com/pesantrenalqodiri.1_jember/"
                    target="_blank"
                    >Instagram</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-youtube"></i>
                  <a
                    href="https://www.youtube.com/@pondokpesantrenal-qodiri1j466"
                    target="_blank"
                    >Youtube</a
                  >
                </li>
                <li>
                  <i class="fa-brands fa-tiktok"></i>
                  <a
                    href="https://www.tiktok.com/@alqodiriputrijember"
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
              <p>+62-821-4038-4613 (Layanan Umum)</p>
            </div>
          </div>
        </div>
        <div class="footer__copyright">
          <span>
            © Pondok Pesantren Alqodiri Jember 2024 | Developer By
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
