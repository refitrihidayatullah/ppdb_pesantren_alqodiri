<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use App\Models\CalonSantri;
use Illuminate\Http\Request;
use App\Models\InformasiPpdb;
use App\Models\StatusValidasi;
use Barryvdh\DomPDF\Facade\Pdf;
use function PHPSTORM_META\map;
use App\Models\AlamatCalonSantri;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\DB;
use App\Models\OrangTuaCalonSantri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class ManagementUsers extends Controller
{
    /**
     * func menampilkan data a users :view
     */

    public function index(): View
    {
        // get data user putri
        // $userPutri = User::with('statusValidasi', 'calonSantris')
        //     ->where('level', 'calonsantri')
        //     ->whereHas('calonSantris', function ($query) {
        //         $query->where('jenis_kelamin_santri', 'perempuan');
        //     })
        //     ->get();
        $userPutri = User::with('statusValidasi', 'calonSantris')
            ->where('level', 'calonsantri')
            ->where('jenkel', 'perempuan')
            ->get();
        $dataUserPutri = $userPutri->map(function ($putra) {
            return collect($putra)->except('password');
        });
        // get data user putra
        // $userPutra = User::with('statusValidasi', 'calonSantris')
        //     ->where('level', 'calonsantri')
        //     ->whereHas('calonSantris', function ($query) {
        //         $query->where('jenis_kelamin_santri', 'laki-laki');
        //     })
        //     ->get();
        $userPutra = User::with('statusValidasi', 'calonSantris')
            ->where('level', 'calonsantri')
            ->where('jenkel', 'laki-laki')
            ->get();
        $dataUserPutra = $userPutra->map(function ($putra) {
            return collect($putra)->except('password');
        });

        // dd($dataUserPutra);
        // get data panitia[admin,superadmin]
        // $dataAllPanitia = User::getAllPanitia();
        $AllPanitia = User::with('statusValidasi')->whereIn('level', ['admin', 'superadmin'])->orderBy('updated_at', 'desc')->get();
        $dataAllPanitia = $AllPanitia->map(function ($panitia) {
            return collect($panitia)->except('password');
        });
        // dd($dataAllPanitia);
        // array level user
        $statusUser = [
            'calonsantri',
            'admin',
            'superadmin'
        ];

        $statusPanitia = [
            'admin',
            'superadmin'
        ];

        //get data alluser
        // $dataAllUsers = User::getAllUsers();
        $userAll = User::with('statusValidasi')->orderBy('updated_at', 'desc')->get();
        // get data user without password
        $dataAllUsers = $userAll->map(function ($user) {
            return collect($user)->except(['password']);
        });
        // dd($dataAllUsers);
        return view('Admin.ManagementUsers.index', compact('dataAllUsers', 'dataUserPutra', 'dataUserPutri', 'statusUser', 'dataAllPanitia', 'statusPanitia'));
    }
    /**
     * func menampilkan data create all users :view
     */
    public function create(): View
    {
        $statusUser = [
            'calonsantri',
            'admin',
            'superadmin'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.AllUsers.create', compact('statusUser', 'jenis_kelamin'));
    }
    /**
     * func menampilkan data create users panitia :view
     */
    public function createPanitia(): View
    {
        $statusUser = [
            'admin',
            'superadmin'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PanitiaUsers.create', compact('statusUser', 'jenis_kelamin'));
    }
    /**
     * func menampilkan data create users putra :view
     */
    public function createUserPutra(): View
    {
        $statusUser = [
            'calonsantri'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PutraUsers.create', compact('statusUser', 'jenis_kelamin'));
    }
    /**
     * func menampilkan data create users putri :view
     */
    public function createUserPutri(): View
    {
        $statusUser = [
            'calonsantri'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PutriUsers.create', compact('statusUser', 'jenis_kelamin'));
    }
    /**
     * func menampilkan data edit all users :view
     */
    public function edit($id): View
    {
        $dataUser =  User::getUserById($id);
        if ($dataUser->level == "superadmin" || $dataUser->level == "admin") {
            $statusUser = [
                'admin',
                'superadmin'
            ];
            $jenis_kelamin = ['laki-laki', 'perempuan'];
        } else {
            $statusUser = [
                'calonsantri'
            ];
            $jenis_kelamin = ['laki-laki', 'perempuan'];
        }
        return view('Admin.ManagementUsers.AllUsers.edit', compact('statusUser', 'dataUser', 'jenis_kelamin'));
    }

    /**
     * func menampilkan data edit users panitia :view
     */
    public function editPanitia($id): View
    {
        $dataPanitia = User::getUserById($id);
        $statusUser = [
            'admin',
            'superadmin'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PanitiaUsers.edit', compact('statusUser', 'dataPanitia', 'jenis_kelamin'));
    }

    /**
     * func menampilkan data edit users panitia :view
     */
    public function editPutra($id): View
    {
        $dataPutra = User::getUserById($id);
        $statusUser = [
            'calonsantri'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PutraUsers.edit', compact('statusUser', 'dataPutra', 'jenis_kelamin'));
    }

    /**
     * func menampilkan data edit users putri :view
     */
    public function editPutri($id): View
    {
        $dataPutri = User::getUserById($id);
        $statusUser = [
            'calonsantri'
        ];
        $jenis_kelamin = ['laki-laki', 'perempuan'];
        return view('Admin.ManagementUsers.PutriUsers.edit', compact('statusUser', 'dataPutri', 'jenis_kelamin'));
    }


    /**
     * func tambah data user :redirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserRules($request->all());
            if ($validation->fails()) {
                return redirect('/users/create')->withErrors($validation)->with('message', 'failed')->withInput();
            }
            $password1 = $request->password;
            $password2 = $request->password_confirm;
            DB::beginTransaction();
            if ($password1 === $password2) {
                $data = $request->all();
                $data = $request->except('password_confirm');
                $data['password'] = Hash::make($password1);
                // insert user
                $user = User::registerUser($data);
                $status = [
                    'nama_status_validasi' => ($data['level'] == "superadmin" || $data['level'] == "admin") ? "accessDenied" : "pending",
                    'user_id' => $user->id_user,
                ];
                StatusValidasi::createStatusValidasi($status);
                DB::commit();
                if ($request->level == "superadmin" || $request->level == "admin") {
                    return redirect('/users')->with('message', 'success');
                } else {
                    return redirect('/form-pendaftaran')->with('success', 'silahkan melakukan pengisian form pendaftaran');
                }
            }
            DB::rollBack();
            return redirect('/users/create')->with('message', 'failed');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan');
        }
    }
    /**
     * func tambah data user panitia :redirectResponse
     */

    public function storePanitia(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserPanitiaRules($request->all());
            if ($validation->fails()) {
                return redirect('/users/create-panitia')->withErrors($validation)->with('message', 'failed')->withInput();
            }
            $password11 = $request->panitiaPassword;
            $password22 = $request->panitiaPassword_confirm;
            DB::beginTransaction();
            if ($password11 === $password22) {
                $data = $request->except($password22);
                $data =
                    [
                        'name' => $request->panitiaName,
                        'email' => $request->panitiaEmail,
                        'no_hp' => $request->panitiaNo_hp,
                        'jenkel' => $request->panitiaJenkel,
                        'level' => $request->panitiaLevel,
                        'password' => Hash::make($password11),
                    ];
                // insert data users
                $user = User::registerUserPanitia($data);
                $status = [
                    'nama_status_validasi' => ($data['level'] == "superadmin" || $data['level'] == "admin") ? "accessDenied" : "pending",
                    'user_id' => $user->id_user,
                ];
                // insert data status validasi
                StatusValidasi::createStatusValidasi($status);
                DB::commit();
                return redirect('/users')->with('message', 'success');
            }
            DB::rollBack();
            return redirect('/users/create-panitia')->with('message', 'failed');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan');
        }
    }

    /**
     * func tambah data user putra :redirectResponse
     */

    public function storePutra(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserPutraRules($request->all());
            if ($validation->fails()) {
                return redirect('/users/create-user-putra')->withErrors($validation)->with('message', 'failed')->withInput();
            }
            $password11 = $request->putraPassword;
            $password22 = $request->putraPassword_confirm;
            DB::beginTransaction();
            if ($password11 === $password22) {
                $data = $request->except($password22);
                $data =
                    [
                        'name' => $request->putraName,
                        'email' => $request->putraEmail,
                        'no_hp' => $request->putraNo_hp,
                        'jenkel' => $request->putraJenkel,
                        'level' => $request->putraLevel,
                        'password' => Hash::make($password11),
                    ];
                // insert data users
                $user = User::registerUserputra($data);
                $status = [
                    'nama_status_validasi' => ($data['level'] == "superadmin" || $data['level'] == "admin") ? "accessDenied" : "pending",
                    'user_id' => $user->id_user,
                ];
                // insert data status validasi
                StatusValidasi::createStatusValidasi($status);
                DB::commit();
                return redirect('/form-pendaftaran')->with('success', 'silahkan melakukan pengisian form pendaftaran');
            }
            DB::rollBack();
            return redirect('/users')->with('message', 'failed');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan');
        }
    }

    /**
     * func tambah data user putri :redirectResponse
     */

    public function storePutri(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserPutriRules($request->all());
            if ($validation->fails()) {
                return redirect('/users/create-user-putri')->withErrors($validation)->with('message', 'failed')->withInput();
            }
            $password11 = $request->putriPassword;
            $password22 = $request->putriPassword_confirm;
            DB::beginTransaction();
            if ($password11 === $password22) {
                $data = $request->except($password22);
                $data =
                    [
                        'name' => $request->putriName,
                        'email' => $request->putriEmail,
                        'no_hp' => $request->putriNo_hp,
                        'jenkel' => $request->putriJenkel,
                        'level' => $request->putriLevel,
                        'password' => Hash::make($password11),
                    ];
                // insert data users
                $user = User::registerUserputri($data);
                $status = [
                    'nama_status_validasi' => ($data['level'] == "superadmin" || $data['level'] == "admin") ? "accessDenied" : "pending",
                    'user_id' => $user->id_user,
                ];
                // insert data status validasi
                StatusValidasi::createStatusValidasi($status);
                DB::commit();
                return redirect('/form-pendaftaran')->with('success', 'silahkan melakukan pengisian form pendaftaran');
            }
            DB::rollBack();
            return redirect('/users')->with('message', 'failed');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan');
        }
    }




    /**
     * func update data alluser :redirectResponse
     */

    public function update(Request $request,  $id): RedirectResponse
    {
        try {
            $validation = ValidatorRules::updateUserRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }

            $data = [
                'name' => $request->updateName,
                'email' => $request->updateEmail,
                'no_hp' => $request->updateNo_hp,
                'jenkel' => $request->updateJenkel,
                'level' => $request->updateLevel,
            ];
            User::updateUser($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }


    /**
     * func update data user panitia :redirectResponse
     */

    public function updatePanitia(Request $request,  $id): RedirectResponse
    {
        try {
            $validation = ValidatorRules::updateUserPanitiaRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }

            $data = [
                'name' => $request->updatePanitiaName,
                'email' => $request->updatePanitiaEmail,
                'no_hp' => $request->updatePanitiaNo_hp,
                'jenkel' => $request->updatePanitiaJenkel,
                'level' => $request->updatePanitiaLevel,
            ];
            User::updateUserPanitia($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan ' . $e->getMessage());
        }
    }

    /**
     * func update data user putra :redirectResponse
     */

    public function updatePutra(Request $request,  $id): RedirectResponse
    {
        try {
            $validation = ValidatorRules::updateUserPutraRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }

            $data = [
                'name' => $request->updatePutraName,
                'email' => $request->updatePutraEmail,
                'no_hp' => $request->updatePutraNo_hp,
                'jenkel' => $request->updatePutraJenkel,
                'level' => $request->updatePutraLevel,
            ];
            User::updateUserPutra($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan ');
        }
    }
    /**
     * func update data user putri :redirectResponse
     */

    public function updatePutri(Request $request,  $id): RedirectResponse
    {
        try {
            $validation = ValidatorRules::updateUserPutriRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }

            $data = [
                'name' => $request->updatePutriName,
                'email' => $request->updatePutriEmail,
                'no_hp' => $request->updatePutriNo_hp,
                'jenkel' => $request->updatePutriJenkel,
                'level' => $request->updatePutriLevel,
            ];
            User::updateUserPutri($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan ');
        }
    }

    /**
     * func delete data user :redirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $data_user = User::where('id_user', $id)->first();
            if ($data_user) {
                // cek ada image lama
                if ($data_user->image) {
                    $image_path = public_path('calon_santri_images') . '/' . $data_user->image;
                    // Jika file gambar ada, hapus file gambar
                    if (file_exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                // delete data user setelah memproses file gambar
                User::deleteUser($id);
            }
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data user panitia :redirectResponse
     */
    public function destroyPanitia($id): RedirectResponse
    {
        try {
            $data_user = User::where('id_user', $id)->first();
            if ($data_user) {
                $image_path = public_path('calon_santri_images') . '/' . $data_user->image;
                // Jika file gambar ada, hapus file gambar
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                // delete data user setelah memproses file gambar
                User::deleteUserPanitia($id);
            }
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data user putra :redirectResponse
     */
    public function destroyPutra($id): RedirectResponse
    {
        try {
            $data_user = User::where('id_user', $id)->first();
            if ($data_user) {
                $image_path = public_path('calon_santri_images') . '/' . $data_user->image;
                // Jika file gambar ada, hapus file gambar
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                // delete data user setelah memproses file gambar
                User::deleteUserPutra($id);
            }
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func delete data user putri :redirectResponse
     */
    public function destroyPutri($id): RedirectResponse
    {
        try {
            $data_user = User::where('id_user', $id)->first();
            if ($data_user) {
                $image_path = public_path('calon_santri_images') . '/' . $data_user->image;
                // Jika file gambar ada, hapus file gambar
                if (file_exists($image_path)) {
                    File::delete($image_path);
                }
                // delete data user setelah memproses file gambar
                User::deleteUserPutri($id);
            }
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }

    /**
     * func change password data user :redirectResponse
     */
    public function changepassword(Request $request, $id): RedirectResponse
    {
        try {
            $user = User::find($id);
            if ($user) {
                $data['password'] = Hash::make($request->password_new);
                User::updateUser($data, $id);
                return redirect('/users')->with('message', 'success');
            } else {
                return redirect('/users')->with('failed', 'failed');
            }
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }

    /**
     * func change password data user panitia :redirectResponse
     */
    public function changepasswordPanitia(Request $request, $id): RedirectResponse
    {
        try {
            $users = User::find($id);
            if ($users) {
                $data['password'] = Hash::make($request->passwordPanitia_new);
                User::updateUserPanitia($data, $id);
                return redirect('/users')->with('message', 'success');
            } else {
                return redirect('/users')->with('failed', 'failed');
            }
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }

    /**
     * func change password data user Putra :redirectResponse
     */
    public function changepasswordPutra(Request $request, $id): RedirectResponse
    {
        try {
            $users = User::find($id);
            if ($users) {
                $data['password'] = Hash::make($request->passwordPutra_new);
                User::updateUserPutra($data, $id);
                return redirect('/users')->with('message', 'success');
            } else {
                return redirect('/users')->with('failed', 'failed');
            }
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func change password data user Putri :redirectResponse
     */
    public function changepasswordPutri(Request $request, $id): RedirectResponse
    {
        try {
            $users = User::find($id);
            if ($users) {
                $data['password'] = Hash::make($request->passwordPutri_new);
                User::updateUserPutri($data, $id);
                return redirect('/users')->with('message', 'success');
            } else {
                return redirect('/users')->with('failed', 'failed');
            }
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
    /**
     * func cetak pdf pendaftaran --management user
     */
    public function cetakPdfFormCalonSantri($id)
    {
        $path = public_path() . '/images/kop.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $image = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $userSantri = User::with('CalonSantris', 'AlamatCalonSantri.alamatProvinsi', 'AlamatCalonSantri.alamatKabupaten', 'AlamatCalonSantri.alamatKecamatan', 'AlamatCalonSantri.alamatKelurahan', 'OrangTuaCalonSantri')->where('id_user', $id)->get();
        $dataUserSantri = collect($userSantri)->reduce(function ($carry, $item) {
            return $carry->merge(collect($item)->except('password'));
        }, collect());

        if ($dataUserSantri['image']) {
            $path_santri = public_path() . '/calon_santri_images/' . $dataUserSantri['image'];
            $type_santri = pathinfo($path_santri, PATHINFO_EXTENSION);
            $data_santri = file_get_contents($path_santri);
            $image_santri = 'data:image/' . $type_santri . ';base64,' . base64_encode($data_santri);
            // dd($image_santri);
        } else {
            $image_santri = false;
        }
        // dd($dataUserSantri);
        $file_name = "bukti_pendaftaran_" . "santri" . Carbon::now()->translatedFormat('d_F_y') . ".pdf";
        // dd($dataUserSantri['image']);
        // return view('pdf.siswa', ['image' => $image, 'get_data_user' => $get_data_user]);
        $pdf = Pdf::loadView('pdf.buktiPendaftaran', compact('image_santri', 'image', 'dataUserSantri'))->setPaper('a4', 'potrate')->setWarnings(false)->save($file_name);
        $response =  $pdf->download($file_name);
        // $response = $pdf->stream();
        unlink(public_path() . "/" . $file_name);
        return $response;
    }
}
