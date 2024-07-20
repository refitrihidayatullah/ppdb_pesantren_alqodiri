<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use Excel;
use App\Models\User;
use Dotenv\Validator;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\View\View;
use App\Models\CalonSantri;
use Illuminate\Http\Request;
use App\Models\InformasiPpdb;
use App\Models\StatusValidasi;
use App\Imports\ProvinsiImport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AlamatCalonSantri;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\DB;
use App\Models\OrangTuaCalonSantri;
use Faker\Provider\Base;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardSantriController extends Controller
{
    /**
     * func menampilkan dashboard :view
     */
    public function index(): View
    {
        $dataSantriById = User::with('Statusvalidasi', 'CalonSantris')->where('id_user', Auth::user()->id_user)->first();
        $dataSantri = collect($dataSantriById)->except('password');
        // dd($dataSantri);
        return view('Santri.Dashboard.index', compact('dataSantri'));
    }

    /**
     * func menampilkan form pendaftaran :view
     */
    public function formPendaftaran(): View
    {

        // cek user active saat ini
        if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
            $cek_user_active = true;
        } else {
            $cek_user_active = false;
        }
        // dd($cek_user_active);

        // mengambil data user dimana id_user belum ada di calon santri


        // $usersWithoutCalonSantri = DB::table('users')
        // ->leftJoin('calon_santris', 'users.id_user', '=', 'calon_santris.user_id')
        // ->where('users.level', '!=', 'superadmin')
        // ->where('users.level', '!=', 'admin')
        // ->whereNull('calon_santris.user_id')
        // ->get();
        $usersWithoutCalonSantri = User::userWithoutIdInCalonSantri();
        // dd(count($usersWithoutCalonSantri));
        $jenjang_pendidikan =
            [
                'MA Al-Qodiri', 'STIKES Bhakti Al-Qodiri', 'MTs Unggulan',
                'SMK Al-Qodiri', 'Pondok Anak', 'SMP Plus Al-Qodiri',
                'IAI Al-Qodiri', 'Hanya Mondok'
            ];
        $pekerjaan_ortu = [
            'Petani', 'Buruh', 'Wiraswasta', 'Ibu Rumah Tangga',
            'Wirausaha', 'PNS', 'Polisi', 'Guru', 'Dokter', 'Lainnya'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        $informasi_ppdb = ['Whatsapp', 'Instagram', 'Facebook', 'Tiktok', 'Brosur', 'Lainnya'];
        $provinsis = Provinsi::getDataProvinsi();
        return view('Santri.FormPendaftaran.index', compact('cek_user_active', 'provinsis', 'informasi_ppdb', 'jenis_kelamin', 'pekerjaan_ortu', 'jenjang_pendidikan', 'usersWithoutCalonSantri'));
    }

    /**
     * func untuk info status pendaftaran 
     */
    public function formInfoPendaftaran(): View
    {
        $cek_user_active = Auth::user()->id_user ?? '';
        return view('Santri.FormPendaftaran.infoForm', compact('cek_user_active'));
    }
    /**
     * func untuk form edit form pendaftaran :View
     */
    public function EditFormPendaftaran($id): View
    {
        // cek user active saat ini
        if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
            // $cek_user_active = true;
            $user_id = User::where('id_user', $id)->value('id_user') ?? '';
        } else {
            // $cek_user_active = false;
            $user_id = Auth::user()->id_user ?? '';
        }
        // dd($user_id);
        // get data edit calon santri by id
        $pendaftaranById = User::with('OrangTuaCalonSantri', 'InformasiPpdb', 'StatusValidasi', 'CalonSantris', 'AlamatCalonSantri.alamatProvinsi', 'AlamatCalonSantri.alamatKabupaten', 'AlamatCalonSantri.alamatKecamatan', 'AlamatCalonSantri.alamatKelurahan')->where('id_user', $user_id)->get();
        // $dataPendaftaranById = $pendaftaranById->map(function ($item) {
        //     return collect($item)->except('password');
        // });
        $dataPendaftaranById = collect($pendaftaranById)->reduce(function ($carry, $item) {
            return $carry->merge(collect($item)->except('password'));
        }, collect());
        // dd($dataPendaftaranById);
        $jenjang_pendidikan =
            [
                'MA Al-Qodiri', 'STIKES Bhakti Al-Qodiri', 'MTs Unggulan',
                'SMK Al-Qodiri', 'Pondok Anak', 'SMP Plus Al-Qodiri',
                'IAI Al-Qodiri', 'Hanya Mondok'
            ];
        $pekerjaan_ortu = [
            'Petani', 'Buruh', 'Wiraswasta', 'Ibu Rumah Tangga',
            'Wirausaha', 'PNS', 'Polisi', 'Guru', 'Dokter', 'Lainnya'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        $informasi_ppdb = ['Whatsapp', 'Instagram', 'Facebook', 'Tiktok', 'Brosur', 'Lainnya'];
        $provinsis = Provinsi::getDataProvinsi();
        return view('Santri.FormPendaftaran.edit ', compact('dataPendaftaranById', 'provinsis', 'informasi_ppdb', 'jenis_kelamin', 'pekerjaan_ortu', 'jenjang_pendidikan'));
    }
    /**
     * func menampilkan data validasi pendaftaran
     */
    public function validasiPendaftaran(): View
    {
        $dataAllPendaftaran = User::with('statusValidasi', 'calonSantris')->where('level', 'calonsantri')->get();
        $allPendaftaran = $dataAllPendaftaran->map(function ($value) {
            return collect($value)->except('password');
        });
        // dd($allPendaftaran);
        return view('Admin.ValidasiPendaftaran.index', compact('allPendaftaran'));
    }
    /**
     * func menampilkan data update validasi pendaftaran
     */
    public function updateValidasiPendaftaran(Request $request, $id)
    {
        try {
            $validation = ValidatorRules::updateValidasi($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }
            $data = ["nama_status_validasi" => $request->updateStatusValidasi];
            StatusValidasi::updateStatusValidasi($data, $id);
            return redirect()->back()->with('message', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'failed' . $e->getMessage());
        }
    }
    /**
     * func untuk update pendaftaran 
     */
    public function updatePendaftaran(Request $request, $id)
    {
        $validation = ValidatorRules::updateFormulirRules($request->all());
        if ($validation->fails()) {
            return redirect("/form-pendaftaran/" . $id . "/edit")->withErrors($validation)->withInput();
        }
        // cek user active saat ini
        if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
            // $cek_user_active = true;
            $user_id = $id ?? '';
        } else {
            // $cek_user_active = false;
            $user_id = Auth::user()->id_user ?? '';
        }
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $updateCalonSantri = [
            'user_id' => $user_id,
            'no_induk_santri' => $request->update_no_induk_santri ?? '-',
            'tanggal_daftar' => $request->update_tanggal_masuk_santri == $today ? $request->update_tanggal_masuk_santri : $today,
            'nama_lengkap_santri' => $request->update_nama_lengkap_santri,
            'tempat_lahir_santri' => $request->update_tempat_lahir_santri,
            'tanggal_lahir_santri' => $request->update_tanggal_lahir_santri,
            'jenis_kelamin_santri' => $request->update_jenis_kelamin_santri,
            'jenjang_pendidikan' => $request->update_jenjang_pendidikan,
        ];
        $updateAlamatCalonSantri = [
            'user_id' => $user_id,
            'provinsi_id' => $request->update_provinsi,
            'kabupaten_id' => $request->update_kabupaten,
            'kecamatan_id' => $request->update_kecamatan,
            'kelurahan_id' => $request->update_kelurahan,
            'dusun_santri' => $request->update_dusun_santri ?? '-',
        ];
        $updateOrangtuaCalonSantri = [
            'user_id' => $user_id,
            'nama_ayah' => $request->update_nama_ayah,
            'pekerjaan_ayah' => $request->update_pekerjaan_ayah,
            'nama_ibu' => $request->update_nama_ibu,
            'pekerjaan_ibu' => $request->update_pekerjaan_ibu,
            'no_telp_ortu' => $request->update_no_telp_ortu,

        ];
        $updateInformasiPpdb = [
            'user_id' => $user_id,
            'name' => $request->update_informasi_ppdb
        ];
        $updateStatusValidasi['nama_status_validasi'] = "in_progress";


        try {
            DB::beginTransaction();
            // update calon santri
            CalonSantri::updateCalonSantri($updateCalonSantri, $user_id);
            // update alamat calon santri
            AlamatCalonSantri::updateAlamatCalonSantri($updateAlamatCalonSantri, $user_id);
            // update orangtua calon santri
            OrangTuaCalonSantri::updateOrangTuaCalonSiswa($updateOrangtuaCalonSantri, $user_id);
            // update informasi ppdb
            InformasiPpdb::updateInformasiPpdb($updateInformasiPpdb, $user_id);
            // update statusValidasi
            StatusValidasi::updateStatusValidasiForm($updateStatusValidasi, $user_id);
            DB::commit();
            if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
                return redirect('/users')->with('success', 'Pendaftaran Berhasil Silahkan Cetak Bukti pendaftaran');
            } else {
                return redirect('/form-info-pendaftaran')->with('message', 'success');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/form-pendaftaran')->with('failed', 'Terjadi Kesalahan' . $e->getMessage())->withInput();
        }
    }
    /**
     * func untuk created pendaftaran 
     */
    public function storePendaftaran(Request $request)
    {
        $validation = ValidatorRules::formulirRules($request->all());
        if ($validation->fails()) {
            return redirect('/form-pendaftaran')->withErrors($validation)->with('message', 'failed')->withInput();
        }
        // cek jika user saat ini admin maka ambil id request
        if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
            $user_id = $request->user;
        } else {
            $user_id =  Auth::user()->id_user;
        }
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $calonSantri = [
            'user_id' => $user_id,
            'no_induk_santri' => $request->no_induk_santri ?? '-',
            'tanggal_daftar' => $request->tanggal_masuk_santri == $today ? $request->tanggal_masuk_santri : $today,
            'nama_lengkap_santri' => $request->nama_lengkap_santri,
            'tempat_lahir_santri' => $request->tempat_lahir_santri,
            'tanggal_lahir_santri' => $request->tanggal_lahir_santri,
            'jenis_kelamin_santri' => $request->jenis_kelamin_santri,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
        ];
        $alamatCalonSantri = [
            'user_id' => $user_id,
            'provinsi_id' => $request->provinsi,
            'kabupaten_id' => $request->kabupaten,
            'kecamatan_id' => $request->kecamatan,
            'kelurahan_id' => $request->kelurahan,
            'dusun_santri' => $request->dusun_santri ?? '-',
        ];
        $orangtuaCalonSantri = [
            'user_id' => $user_id,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'no_telp_ortu' => $request->no_telp_ortu,

        ];
        $informasiPpdb = [
            'user_id' => $user_id,
            'name' => $request->informasi_ppdb
        ];
        $statusValidasi['nama_status_validasi'] = "in_progress";

        // dd([$calonSantri, $alamatCalonSantri, $orangtuaCalonSantri, $informasiPpdb]);
        // die;

        try {
            DB::beginTransaction();
            // insert calon santri
            CalonSantri::insertCalonSantri($calonSantri);
            // insert alamat calon santri
            AlamatCalonSantri::insertAlamatCalonSantri($alamatCalonSantri);
            // insert orangtua calon santri
            OrangTuaCalonSantri::insertOrangTuaCalonSiswa($orangtuaCalonSantri);
            // insert informasi ppdb
            InformasiPpdb::insertInformasiPpdb($informasiPpdb);
            // update statusValidasi
            StatusValidasi::updateStatusValidasiForm($statusValidasi, $user_id);
            DB::commit();
            if (Auth::user()->level == "superadmin" || Auth::user()->level == "admin") {
                return redirect('/users')->with('success', 'Pendaftaran Berhasil Silahkan Cetak Bukti pendaftaran');
            } else {
                return redirect('/form-info-pendaftaran')->with('message', 'success');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/form-pendaftaran')->with('failed', 'Terjadi Kesalahan' . $e->getMessage())->withInput();
        }
    }

    /**
     * func cetak pendaftaran
     */
    public function cetakPendaftaran($id)
    {
        $path = public_path() . '/images/kop.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $file_name = "bukti_pendaftaran_" . "santri" . Carbon::now()->translatedFormat('d_F_y') . ".pdf";
        $userSantri = User::with('CalonSantris', 'AlamatCalonSantri.alamatProvinsi', 'AlamatCalonSantri.alamatKabupaten', 'AlamatCalonSantri.alamatKecamatan', 'AlamatCalonSantri.alamatKelurahan', 'OrangTuaCalonSantri')->where('id_user', $id)->get();
        $dataUserSantri = collect($userSantri)->reduce(function ($carry, $item) {
            return $carry->merge(collect($item)->except('password'));
        }, collect());
        // dd($dataUserSantri);
        // return view('pdf.siswa', ['image' => $image, 'get_data_user' => $get_data_user]);
        $pdf = Pdf::loadView('pdf.buktiPendaftaran', compact('image', 'dataUserSantri'))->setPaper('a4', 'potrate')->setWarnings(false)->save($file_name);
        // $response =  $pdf->download($file_name);
        $response = $pdf->stream();
        unlink(public_path() . "/" . $file_name);
        return $response;
    }



    /**
     * func menampilkan data import provinsi
     */
    public function provinsi(): View
    {
        return view('Santri.FormPendaftaran.provinsi');
    }


    /**
     * func menambahkan import provinsi
     */
    public function storeProvinsi(Request $request)
    {
        // dd($request->all());
        Excel::import(new ProvinsiImport, $request->file('import_file'));
        // $test =   Excel::import(new ProvinsiImport, $request->file('provinsi'));
        return redirect()->back()->with('message', 'success');
        // dd($test);
        // (new ProvinsiImport)->import('provinsi.csv', null, \Maatwebsite\Excel\Excel::CSV);
    }


    /**
     * func mengambil data kabupaten
     */
    // public function getkabupaten(Request $request)
    // {
    //     $id_provinsi = $request->id_provinsi;
    //     $kabupatens = Kabupaten::where('provinsi_id', $id_provinsi)->get();

    //     $option = "<option>Pilih Kabupaten..</option>";
    //     foreach ($kabupatens as $kabupaten) {
    //         $option .= "<option value='$kabupaten->id_kabupaten'>$kabupaten->name - $kabupaten->id_kabupaten </option>";
    //     }
    //     echo $option;
    // }

    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Kabupaten::where('provinsi_id', $id_provinsi)->get();
        return response()->json($kabupatens);
    }


    /**
     * funcmengambil data kecamatan
     */

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = Kecamatan::where('kabupaten_id', $id_kabupaten)->get();
        return response()->json($kecamatans);
    }


    /**
     * func mengambil data kelurahan
     */

    public function getkelurahan(Request $request)
    {
        $kelurahans = Kelurahan::where('kecamatan_id', $request->id_kecamatan)->get();
        return response()->json($kelurahans);
    }
}
