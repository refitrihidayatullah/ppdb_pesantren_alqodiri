<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        *{
            margin:0;
            padding:0;
        }
        body{
            font-family: "Roboto", sans-serif;
        }
        .container{
            padding: 0 3rem;
        }
        .clearfix::after {
         content: "";
         clear: both;
         display: table;
        }
    </style>
    <body>
        <div class="container">
            <div class="kopsurat">
                <img style="width:100%;height:100px; " src="{{ $image }}" alt="" />
            </div>
                <h5 style=" margin:3px auto;text-align:center;text-transform: uppercase;text-decoration: underline;">formulir pendaftaran santri baru</h5>
            <div class="main">
                    <div class="data_santri">
                        <div class="content_santri_data clearfix">
                            <table style="width:65%;float:left;" >
                                <p style="font-size:13px; font-weight: bold;text-decoration: underline;">SANTRI</p>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">1. Nomor induk santri</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['no_induk_santri']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">2. Nama lengkap santri*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['nama_lengkap_santri']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">3. Tanggal masuk*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['nama_lengkap_santri']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">4. Tempat lahir*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['tempat_lahir_santri']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">5. Tanggal lahir</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['tanggal_lahir_santri']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">6. Alamat lengkap</td>
                                  <td style="font-size:12px;line-height: 1.5;"></td>
                                  <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">&nbsp;&nbsp;&nbsp;a. Dusun</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['alamat_calon_santri']['dusun_santri']??''}}</td>
                                  </tr>
                                  <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">&nbsp;&nbsp;&nbsp;b. Desa/kelurahan*</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['alamat_calon_santri']['alamat_kelurahan']['name']??''}}</td>
                                  </tr>
                                  <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">&nbsp;&nbsp;&nbsp;c. Kecamatan*</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['alamat_calon_santri']['alamat_kecamatan']['name']??''}}</td>
                                  </tr>
                                  <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">&nbsp;&nbsp;&nbsp;d. Kabupaten*</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['alamat_calon_santri']['alamat_kabupaten']['name']??''}}</td>
                                  </tr>
                                  <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">&nbsp;&nbsp;&nbsp;e. Provinsi*</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['alamat_calon_santri']['alamat_provinsi']['name']??''}}</td>
                                  </tr>
                                </tr>
                                <tr>
                                    <td style=" font-size:12px;line-height: 1.5;">7. Jenjang pendidikan yang dipilih*</td>
                                    <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['calon_santris']['jenjang_pendidikan']??''}}</td>
                                  </tr>
                               
                              </table>
                              <div class="foto_santri" style="width:20%;float:right;margin-top:20px;margin-left:200px;">
                                <div style="border: 1px solid black; height:100px;width:95px;">
                                    <p style="text-align: center">FOTO</p>
                                    <p style="text-align: center">3 x 4</p>
                                </div>
                              </div>
                        </div>
                        <div class="content_orangtua_data clearfix" >
                            <table style="width:75%;float:left;" >
                                <p style="font-size:13px; font-weight: bold;text-decoration: underline;">ORANG TUA / WALI</p>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">1. Nama ayah*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['orang_tua_calon_santri']['nama_ayah']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">2. Pekerjaan ayah*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['orang_tua_calon_santri']['pekerjaan_ayah']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">3. Nama ibu*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['orang_tua_calon_santri']['nama_ibu']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">4. Pekerjaan ibu*</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['orang_tua_calon_santri']['pekerjaan_ibu']??''}}</td>
                                </tr>
                                <tr>
                                  <td style=" font-size:12px;line-height: 1.5;">5. No. Handphone</td>
                                  <td style="font-size:12px;line-height: 1.5;">: {{$dataUserSantri['orang_tua_calon_santri']['no_telp_ortu']??''}}</td>
                                </tr>                               
                              </table>
                           
                        </div>
                        <div class="content_pernyataan_data clearfix" >
                            <table style="width:100%; >
                                <p style="font-size:13px; font-weight: bold;text-decoration: underline;">PERNYATAAN</p>
                                <p style="font-size:12px;text-align: justify;text-indent: 3%;line-height: 1.5;">Saya sebagai wali santri memasrahkan sepenuhnya anak saya di Pondok Pesantren Al-Qodiri 1 jember dan
                                    bersedia sepenuhnya mentaati segala aturan pesantren yang berada di Buku Perizinan dan Peraturan Undang
                                    -Undang Santri. Hal ini dibuktikan dengan tanda tangan saya dan anak saya dibawah ini.
                                </p>
                                <p style="width:100%;text-align: right;font-size:13px;line-height: 1.5;">Jember, {{$dataUserSantri['calon_santris']['tanggal_daftar']??''}}</p>
                        </div>
                        <div class="content_ttd_data clearfix" style="width:80%;margin:0 auto;" >
                           <div class="ttd_ortu" style="width:50%;float:left;">
                            <div style="width: 160px;">
                                <p style="font-size:13px;text-align:center;">Orang Tua/Wali Santri</p>
                                <div style="border: 1px dotted grey;height:40px; width:80px;margin:5px auto;">
                                    <p style="font-size:9px; text-align:center;">Materai</p>
                                    <p style="font-size:9px; text-align:center;">10.000</p>
                                </div>
                                <p style="font-size:12px;text-align:center;">( {{$dataUserSantri['orang_tua_calon_santri']['nama_ayah']??''}} )</p>
                            </div>
                           </div>
                           <div class="ttd_santri" style="width:50%;float:left;margin-left:80px;">
                            <div style="width: 160px;">
                                <p style="font-size:13px;text-align:center;">Santri Bersangkutan</p>
                                <div style="height:40px; width:80px;margin:5px auto;">
                                   
                                </div>
                                <p style="font-size:12px;text-align:center;">( {{$dataUserSantri['calon_santris']['nama_lengkap_santri']? $dataUserSantri['calon_santris']['nama_lengkap_santri'] : $dataUserSantri['name']  }} )</p>
                            </div>
                           </div>
                        </div>
                        <div class="content_ttdpengurus_data" style="width:100%;">
                                <div style="width: 160px;margin:0 auto;">
                                    <p style="font-size:13px;text-align:center;">Pengurus Yang Bertugas</p>
                                    <div style="height:40px; width:80px;margin:5px auto;">                                     
                                    </div>
                                    <p style="font-size:12px;text-align:center;">( ..................... )</p>
                                </div>
                        </div>
                        <p style="font-size:10px;margin-top:20px;">Persyaratan Lainnya: FC KTP WALI*, AKTA KELAHIRAN, FC KK.</p>
                        <p style="font-size:10px;">Perlengkapan Santri: Buku Perizinan, Seragam, KTS, Kartu SPP.</p>
                        
                </div>
        </div>
    </body>
</html>
