<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use Excel;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\View\View;
use App\Models\CalonSantri;
use Illuminate\Http\Request;
use App\Models\InformasiPpdb;
use App\Imports\ProvinsiImport;
use App\Models\AlamatCalonSantri;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\DB;
use App\Models\OrangTuaCalonSantri;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardSantriController extends Controller
{
    /**
     * func menampilkan dashboard :view
     */
    public function index(): View
    {
        return view('Santri.Dashboard.index');
    }

    /**
     * func menampilkan form pendaftaran :view
     */
    public function formPendaftaran(): View
    {


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
        return view('Santri.FormPendaftaran.index', compact('provinsis', 'informasi_ppdb', 'jenis_kelamin', 'pekerjaan_ortu', 'jenjang_pendidikan'));
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
        $user_id =  Auth::user()->id_user;
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
            DB::commit();
            return redirect('/dashboard-santri')->with('success', 'Pendaftaran Berhasil Silahkan Cetak Bukti pendaftaran');
        } catch (\Exception $e) {

            DB::rollback();
            return redirect('/form-pendaftaran')->with('failed', 'Terjadi Kesalahan' . $e->getMessage())->withInput();
        }
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
    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Kabupaten::where('provinsi_id', $id_provinsi)->get();

        $option = "<option>Pilih Kabupaten..</option>";
        foreach ($kabupatens as $kabupaten) {
            $option .= "<option value='$kabupaten->id_kabupaten'>$kabupaten->name - $kabupaten->id_kabupaten </option>";
        }
        echo $option;
    }

    /**
     * funcmengambil data kecamatan
     */
    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = Kecamatan::where('kabupaten_id', $id_kabupaten)->get();
        $option = "<option>Pilih Kacamatan..</option>";
        foreach ($kecamatans as $kecamatan) {
            $option .= "<option value='$kecamatan->id_kecamatan'>$kecamatan->name - $kecamatan->id_kecamatan </option>";
        }
        echo $option;
    }

    /**
     * func mengambil data kelurahan
     */
    public function getkelurahan(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahans = Kelurahan::where('kecamatan_id', $id_kecamatan)->get();
        $option = "<option>Pilih Kelurahan..</option>";
        foreach ($kelurahans as $kelurahan) {
            $option .= "<option value='$kelurahan->id_kelurahan'>$kelurahan->name - $kelurahan->id_kelurahan </option>";
        }
        echo $option;
    }
}
