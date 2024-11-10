<?php

namespace App\Http\Controllers;

use COM;
use Illuminate\View\View;
use App\Models\ContentWeb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ContentImageSyarat;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\File;
use App\Models\ContentAlurPenyerahan;
use App\Models\ContentAlurPendaftaran;
use App\Models\ContentImageInformasi;
use App\Models\ContentSyaratPendaftaran;
use App\Models\ContentInformasiPelayanan;
use Illuminate\Contracts\Validation\ValidationRule;

class ManagementContent extends Controller
{
    /**
     * func index :view
     */
    public function index(): View
    {
        $cekContentGeneral = ContentWeb::count();
        $cekContentAlurPendaftaran = ContentAlurPendaftaran::count();
        $cekContentSyaratPendaftaran = ContentSyaratPendaftaran::count();
        $cekImageContentSyaratPendaftaran = ContentImageSyarat::count();
        $cekImageContentInformasiPelayanan = ContentImageInformasi::count();
        $cekContentAlurPenyerahan = ContentAlurPenyerahan::count();
        $cekContentInformasiPelayanan = ContentInformasiPelayanan::count();
        $dataAllGeneral = ContentWeb::getAllDataGeneral();
        $dataAllAlurPendaftaran = ContentAlurPendaftaran::getAllDataAlurPendaftaran();
        $dataAllSyaratPendaftaran = ContentSyaratPendaftaran::getAllDataSyaratPendaftaran();
        $dataAllImageSyaratPendaftaran = ContentImageSyarat::all();
        $dataAllAlurPenyerahan = ContentAlurPenyerahan::getAllDataAlurPenyerahan();
        $dataAllInformasiPelayanan = ContentInformasiPelayanan::getAllDataInformasiPelayanan();
        $dataAllImageInformasiPelayanan = ContentImageInformasi::all();
        return view('Admin.ManagementContent.index', compact('cekImageContentInformasiPelayanan', 'dataAllImageInformasiPelayanan', 'dataAllImageSyaratPendaftaran', 'cekImageContentSyaratPendaftaran', 'dataAllGeneral', 'cekContentGeneral', 'dataAllAlurPendaftaran', 'cekContentAlurPendaftaran', 'dataAllSyaratPendaftaran', 'cekContentSyaratPendaftaran', 'dataAllAlurPenyerahan', 'cekContentAlurPenyerahan', 'dataAllInformasiPelayanan', 'cekContentInformasiPelayanan'));
    }
    /**
     * func data general :view
     */
    public function createGeneral(): View
    {
        return view('Admin.ManagementContent.General.create');
    }
    /**
     * func data alur pendaftaran :view
     */
    public function createAlurPendaftaran(): View
    {
        return view('Admin.ManagementContent.AlurPendaftaran.create');
    }
    /**
     * func data syarat pendaftaran :view
     */
    public function createSyaratPendaftaran(): View
    {
        return view('Admin.ManagementContent.SyaratPendaftaran.create');
    }
    /**
     * func data alur penyerahan :view
     */
    public function createAlurPenyerahan(): View
    {
        return view('Admin.ManagementContent.AlurPenyerahan.create');
    }
    /**
     * func create informasi pelayanan :view
     */
    public function createInformasiPelayanan(): View
    {
        return view('Admin.ManagementContent.InformasiPelayanan.create');
    }
    /**
     * func tambah data general :redirectResponse
     */
    public function storeGeneral(Request $request)
    {
        try {
            $validation = ValidatorRules::tambahGeneral($request->all());
            if ($validation->fails()) {
                return redirect('/content/create-general')->withErrors($validation)->withInput();
            }
            $data =
                [
                    'title_web'  => $request->title_web,
                    'sub_title_web' => $request->sub_title_web,
                    'data_title_web' => $request->data_title_web,
                    'dari_tahun_ajaran_web' => $request->dari_tahun_ajaran_web,
                    'sampai_tahun_ajaran_web' => $request->sampai_tahun_ajaran_web,
                    'alamat_pondok' => $request->alamat_pondok,
                    'email_pondok' => $request->email_pondok,
                    'no_telp_pondok' => $request->no_telp_pondok,
                    'facebook_pondok' => $request->facebook_pondok ?? '#',
                    'instagram_pondok' => $request->instagram_pondok ?? '#',
                    'youtube_pondok' => $request->youtube_pondok ?? '#',
                    'tiktok_pondok' => $request->tiktok_pondok ?? '#',
                ];
            $cekContent = ContentWeb::count();
            if ($cekContent == 0) {
                ContentWeb::insertGeneral($data);
                return redirect('/content')->with('message', 'success');
            }
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }

    /**
     * func tambah data alur pendaftaran online :redirectResponse
     */
    public function storeAlurPendaftaran(Request $request)
    {
        $validation = ValidatorRules::tambahAlurPendaftaran($request->all());
        if ($validation->fails()) {
            return redirect('/content/create-alurpendaftaran')->withErrors($validation)->withInput();
        }
        $cekContentAlurPendaftaran = ContentAlurPendaftaran::count();
        try {
            if ($cekContentAlurPendaftaran >= 5) {
                return redirect('/content')->with('failed', 'Terjadi Kesalahan limit pengisisan 5');
            } else {
                ContentAlurPendaftaran::insertAlurPendaftaran($request->all());
                return redirect('/content')->with('message', 'success');
            }
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func tambah data syarat pendaftaran :redirectResponse
     */
    public function storeSyaratPendaftaran(Request $request)
    {
        $validation = ValidatorRules::tambahSyaratPendaftaran($request->all());
        if ($validation->fails()) {
            return redirect('/content/create-syaratpendaftaran')->withErrors($validation)->withInput();
        }
        $cekContentSyaratPendaftaran = ContentSyaratPendaftaran::count();
        try {
            if ($cekContentSyaratPendaftaran >= 4) {
                return redirect('/content')->with('failed', 'Terjadi Kesalahan limit pengisisan 4');
            } else {
                $data = $request->all();
                ContentSyaratPendaftaran::insertSyaratPendaftaran($data);
                return redirect('/content')->with('message', 'success');
            }
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func tambah/upload image data syarat pendaftaran :redirectResponse
     */
    public function storeImageSyaratPendaftaran(Request $request)
    {
        try {
            if ($request->hasFile('image_syarat_pendaftaran')) {
                $image_file = $request->file('image_syarat_pendaftaran');
                $image_extension = $image_file->extension();
                $image_rename = "content" . "_" . date('d_m_y_h_i_s') . "_" . Str::random(8) . "." . $image_extension;
                $image_file->move(public_path('content_images'), $image_rename);
                $sv_images = $image_rename;
            } else {
                return redirect('/content')->with('failed', 'Tidak terjadi perubahan');
            }
            $data = ['image_syarat' => $sv_images];
            ContentImageSyarat::create($data);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func tambah data alur penyerahan :redirectResponse
     */
    public function storeAlurPenyerahan(Request $request)
    {
        $validation = ValidatorRules::tambahAlurPenyerahan($request->all());
        if ($validation->fails()) {
            return redirect('/content/create-alurpenyerahan')->withErrors($validation)->withInput();
        }
        $cekContentAlurPenyerahan = ContentAlurPenyerahan::count();
        try {
            if ($cekContentAlurPenyerahan >= 5) {
                return redirect('/content')->with('failed', 'Terjadi Kesalahan limit pengisian 5');
            } else {
                ContentAlurPenyerahan::insertAlurPenyerahan($request->all());
                return redirect('/content')->with('message', 'success');
            }
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func store data informasi pelayanan :redirectResponse
     */
    public function storeInformasiPelayanan(Request $request)
    {
        try {
            $data =
                [
                    'dari_tanggal_pembukaan_pendaftaran' => $request->dari_tanggal_pembukaan_pendaftaran ?? '-',
                    'sampai_tanggal_pembukaan_pendaftaran' => $request->sampai_tanggal_pembukaan_pendaftaran ?? '-',
                    'layanan_putra' => $request->layanan_putra ?? '-',
                    'layanan_putri' => $request->layanan_putri ?? '-',
                    'dari_tanggal_verifikasi_berkas' => $request->dari_tanggal_verifikasi_berkas ?? '-',
                    'sampai_tanggal_verifikasi_berkas' => $request->sampai_tanggal_verifikasi_berkas ?? '-',
                    'tempat_verifikasi_berkas' => $request->tempat_verifikasi_berkas ?? '-',
                    'dari_pelayanan_waktu_pagi' => $request->dari_pelayanan_waktu_pagi ?? '-',
                    'sampai_pelayanan_waktu_pagi' => $request->sampai_pelayanan_waktu_pagi ?? '-',
                    'dari_pelayanan_waktu_siang' => $request->dari_pelayanan_waktu_siang ?? '-',
                    'sampai_pelayanan_waktu_siang' => $request->sampai_pelayanan_waktu_siang ?? '-',
                ];
            $cekContentInformasiPelayanan = ContentInformasiPelayanan::count();
            if ($cekContentInformasiPelayanan > 0) {
                return redirect('/content')->with('failed', 'Terjadi Kesalahan limit 1');
            }
            ContentInformasiPelayanan::insertInformasiPelayanan($data);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan' . $e->getMessage());
        }
    }
    public function storeImageInformasiPelayanan(Request $request)
    {
        try {
            if ($request->hasFile('image_informasi_pelayanan')) {
                $image_file = $request->file('image_informasi_pelayanan');
                $image_extension = $image_file->extension();
                $image_rename = "content" . "_" . date('y_m_d_h_i_s') . "_" . Str::random(8) . "." . $image_extension;
                $image_file->move(public_path('content_images'), $image_rename);
                $sv_image = $image_rename;
            } else {
                return redirect('/content')->with('failed', 'Tidak Terjadi Perubahan');
            }
            $data = ['image_informasi' => $sv_image];
            ContentImageInformasi::create($data);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func edit data alur pendaftaran online :view
     */
    public function editAlurPendaftaran($id): View
    {
        $getDataAlurPendaftaranById = ContentAlurPendaftaran::getDataAlurPendaftaranById($id);
        return view('Admin.ManagementContent.AlurPendaftaran.edit', compact('getDataAlurPendaftaranById'));
    }
    /**
     * func edit data syarat pendaftaran :view
     */
    public function editSyaratPendaftaran($id): View
    {
        $getDataSyaratPendaftaranById = ContentSyaratPendaftaran::getDataSyaratPendaftaranById($id);

        return view('Admin.ManagementContent.SyaratPendaftaran.edit', compact('getDataSyaratPendaftaranById'));
    }
    /**
     * func edit data alur penyerahan :view
     */
    public function editAlurPenyerahan($id): View
    {
        $getDataAlurPenyerahanById = ContentAlurPenyerahan::getDataAlurPenyerahanById($id);

        return view('Admin.ManagementContent.AlurPenyerahan.edit', compact('getDataAlurPenyerahanById'));
    }
    /**
     * func eidt data informasi pelayanan :redirectResponse
     */
    public function editInformasiPelayanan($id): View
    {
        $getDataInformasiPelayananById = ContentInformasiPelayanan::getDataInformasiPelayananById($id);

        return view('Admin.ManagementContent.InformasiPelayanan.edit', compact('getDataInformasiPelayananById'));
    }
    /**
     * func update data alur pendaftaran online :redirectResponse
     */
    public function updateAlurPendaftaran(Request $request, $id)
    {
        $validation = ValidatorRules::updateAlurPendaftaran($request->all());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        try {
            $data =
                [
                    'title_alur_pendaftaran_online' => $request->update_title_alur_pendaftaran_online,
                    'sub_title_alur_pendaftaran_online' => $request->update_sub_title_alur_pendaftaran_online
                ];
            ContentAlurPendaftaran::updateAlurPendaftaran($data, $id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func update data syarat pendaftaran :redirectResponse
     */
    public function updateSyaratPendaftaran(Request $request, $id)
    {
        $validation = ValidatorRules::updateSyaratPendaftaran($request->all());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        try {
            $data =
                [
                    'title_syarat_pendaftaran' => $request->update_title_syarat_pendaftaran,
                    'sub_title_syarat_pendaftaran' => $request->update_sub_title_syarat_pendaftaran
                ];
            ContentSyaratPendaftaran::updateSyaratPendaftaran($data, $id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func update data image syarat pendaftaran :redirectResponse
     */
    public function updateImageSyaratPendaftaran(Request $request, $id)
    {
        try {
            $data = ContentImageSyarat::where('id_image_syarat', $id)->first();
            if ($request->hasFile('image_syarat_pendaftaran')) {
                if ($data->image_syarat) {
                    $image_old = public_path('content_images') . '/' . $data->image_syarat;
                    if (file_exists($image_old)) {
                        File::delete($image_old);
                    }
                }
                $image_file = $request->file('image_syarat_pendaftaran');
                $image_extension = $image_file->extension();
                $image_rename = "content" . "_" . date('d_m_y_h_i_s') . "_" . Str::random(8) . "." . $image_extension;
                $image_file->move(public_path('content_images'), $image_rename);
                $data_image = ['image_syarat' => $image_rename];
                ContentImageSyarat::where('id_image_syarat', $id)->update($data_image);
                return redirect('/content')->with('message', 'success');
            } else {
                return redirect('/content')->with('failed', 'Tidak Terjadi Perubahan');
            }
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func update data alur penyerahan :redirectResponse
     */
    public function updateAlurPenyerahan(Request $request, $id)
    {
        $validation = ValidatorRules::updateAlurPenyerahan($request->all());
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        try {
            $data =
                [
                    'title_alur_penyerahan_santri' => $request->update_title_alur_penyerahan_santri,
                    'sub_title_alur_penyerahan_santri' => $request->update_sub_title_alur_penyerahan_santri
                ];
            ContentAlurPenyerahan::updateAlurPenyerahan($data, $id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func update data informasi pelayanan :redirectResponse
     */
    public function updateInformasiPelayanan(Request $request, $id)
    {
        try {
            $data =
                [
                    'dari_tanggal_pembukaan_pendaftaran' => $request->update_dari_tanggal_pembukaan_pendaftaran ?? '-',
                    'sampai_tanggal_pembukaan_pendaftaran' => $request->update_sampai_tanggal_pembukaan_pendaftaran ?? '-',
                    'layanan_putra' => $request->update_layanan_putra ?? '-',
                    'layanan_putri' => $request->update_layanan_putri ?? '-',
                    'dari_tanggal_verifikasi_berkas' => $request->update_dari_tanggal_verifikasi_berkas ?? '-',
                    'sampai_tanggal_verifikasi_berkas' => $request->update_sampai_tanggal_verifikasi_berkas ?? '-',
                    'tempat_verifikasi_berkas' => $request->update_tempat_verifikasi_berkas ?? '-',
                    'dari_pelayanan_waktu_pagi' => $request->update_dari_pelayanan_waktu_pagi ?? '-',
                    'sampai_pelayanan_waktu_pagi' => $request->update_sampai_pelayanan_waktu_pagi ?? '-',
                    'dari_pelayanan_waktu_siang' => $request->update_dari_pelayanan_waktu_siang ?? '-',
                    'sampai_pelayanan_waktu_siang' => $request->update_sampai_pelayanan_waktu_siang ?? '-',
                ];
            ContentInformasiPelayanan::updateInformasiPelayanan($data, $id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func update upload image informasi pelayanan  :redirectResponse
     */
    public function updateImageInformasiPelayanan(Request $request, $id)
    {
        try {
            $data = ContentImageInformasi::where('id_image_informasi', $id)->first();
            if ($request->hasFile('image_informasi_pelayanan')) {
                if ($data->image_informasi) {
                    $image_old = public_path('content_images') . '/' . $data->image_informasi;
                    if (file_exists($image_old)) {
                        File::delete($image_old);
                    }
                }
                $image_file = $request->file('image_informasi_pelayanan');
                $image_extension = $image_file->extension();
                $image_rename = "content" . "_" . date('d_m_y_h_i_s') . "_" . Str::random(8) . "." . $image_extension;
                $image_file->move(public_path('content_images'), $image_rename);
                $data_image = ['image_informasi' => $image_rename];
                ContentImageInformasi::where('id_image_informasi', $id)->update($data_image);
                return redirect('/content')->with('message', 'success');
            } else {
                return redirect('/content')->with('failed', 'Tidak Terjadi Perubahan');
            }
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func edit data general :redirectResponse
     */
    public function editGeneral($id): View
    {
        $dataGeneralById = ContentWeb::getDataGeneralById($id);
        return view('Admin.ManagementContent.General.edit', compact('dataGeneralById'));
    }
    /**
     * func update data general :redirectResponse
     */
    public function updateGeneral(Request $request, $id)
    {
        try {
            $validation = ValidatorRules::updateGeneral($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }
            $data =
                [
                    'title_web'  => $request->update_title_web,
                    'sub_title_web' => $request->update_sub_title_web,
                    'data_title_web' => $request->update_data_title_web,
                    'dari_tahun_ajaran_web' => $request->update_dari_tahun_ajaran_web,
                    'sampai_tahun_ajaran_web' => $request->update_sampai_tahun_ajaran_web,
                    'alamat_pondok' => $request->update_alamat_pondok,
                    'email_pondok' => $request->update_email_pondok,
                    'no_telp_pondok' => $request->update_no_telp_pondok,
                    'facebook_pondok' => $request->update_facebook_pondok ?? '#',
                    'instagram_pondok' => $request->update_instagram_pondok ?? '#',
                    'youtube_pondok' => $request->update_youtube_pondok ?? '#',
                    'tiktok_pondok' => $request->update_tiktok_pondok ?? '#',
                ];
            ContentWeb::updateGeneral($data, $id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data general :redirectResponse
     */
    public function destroyGeneral($id)
    {
        try {

            ContentWeb::deleteGeneral($id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data alur pendaftaran :redirectResponse
     */
    public function destroyAlurPendaftaran($id)
    {
        try {
            ContentAlurPendaftaran::deleteAlurPendaftaran($id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data syarat pendaftaran :redirectResponse
     */
    public function destroySyaratPendaftaran($id)
    {
        try {
            ContentSyaratPendaftaran::deleteSyaratPendaftaran($id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data image syarat pendaftaran :redirectResponse
     */
    public function destroyImageSyaratPendaftaran($id)
    {
        try {
            $data = ContentImageSyarat::where('id_image_syarat', $id)->first();
            if ($data) {
                $image_path = public_path('content_images') . '/' . $data->image_syarat;
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                ContentImageSyarat::deleteImageSyaratPendaftaran($id);
            }
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data alur penyerahan :redirectResponse
     */
    public function destroyAlurPenyerahan($id)
    {
        try {
            ContentAlurPenyerahan::deleteAlurPenyerahan($id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data informasi pelayanan :redirectResponse
     */
    public function destroyInformasiPelayanan($id)
    {
        try {
            ContentInformasiPelayanan::deleteInformasiPelayanan($id);
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete image data informasi pelayanan :redirectResponse
     */
    public function destroyImageInformasiPelayanan($id)
    {
        try {
            $data = ContentImageInformasi::where('id_image_informasi', $id)->first();
            if ($data) {
                $image_path = public_path('content_images') . '/' . $data->image_informasi;
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                ContentImageInformasi::deleteImageInformasiPelayanan($id);
            }
            return redirect('/content')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/content')->with('failed', 'Terjadi Kesalahan');
        }
    }
}
