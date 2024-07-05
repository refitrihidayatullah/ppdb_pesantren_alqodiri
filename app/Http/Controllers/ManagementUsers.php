<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\CalonSantri;
use Illuminate\Http\Request;
use App\Models\InformasiPpdb;
use App\Models\StatusValidasi;
use function PHPSTORM_META\map;
use App\Models\AlamatCalonSantri;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\DB;
use App\Models\OrangTuaCalonSantri;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class ManagementUsers extends Controller
{
    /**
     * func menampilkan data a users :view
     */

    public function index(): View
    {
        // get data user putra
        $userPutra = User::with('statusValidasi', 'calonSantris')
            ->where('level', 'calonsantri')
            ->whereHas('calonSantris', function ($query) {
                $query->where('jenis_kelamin_santri', 'laki-laki');
            })
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
            'calonsantri', 'admin', 'superadmin'
        ];

        $statusPanitia = [
            'admin', 'superadmin'
        ];

        //get data alluser
        // $dataAllUsers = User::getAllUsers();
        $userAll = User::with('statusValidasi')->orderBy('updated_at', 'desc')->get();
        // get data user without password
        $dataAllUsers = $userAll->map(function ($user) {
            return collect($user)->except(['password']);
        });
        // dd($dataAllUsers);
        return view('Admin.ManagementUsers.index', compact('dataAllUsers', 'dataUserPutra', 'statusUser', 'dataAllPanitia', 'statusPanitia'));
    }
    /**
     * func menampilkan data create all users :view
     */
    public function create(): View
    {
        $statusUser = [
            'calonsantri', 'admin', 'superadmin'
        ];
        return view('Admin.ManagementUsers.AllUsers.create', compact('statusUser'));
    }
    /**
     * func menampilkan data create users panitia :view
     */
    public function createPanitia(): View
    {
        $statusUser = [
            'admin', 'superadmin'
        ];
        return view('Admin.ManagementUsers.PanitiaUsers.create', compact('statusUser'));
    }
    /**
     * func menampilkan data create users putra :view
     */
    public function createUserPutra(): View
    {
        $statusUser = [
            'calonsantri'
        ];
        return view('Admin.ManagementUsers.PutraUsers.create', compact('statusUser'));
    }
    /**
     * func menampilkan data edit all users :view
     */
    public function edit($id): View
    {
        $dataUser =  User::getUserById($id);
        if ($dataUser->level == "superadmin" || $dataUser->level == "admin") {
            $statusUser = [
                'admin', 'superadmin'
            ];
        } else {
            $statusUser = [
                'calonsantri'
            ];
        }
        return view('Admin.ManagementUsers.AllUsers.edit', compact('statusUser', 'dataUser'));
    }

    /**
     * func menampilkan data edit users panitia :view
     */
    public function editPanitia($id): View
    {
        $dataPanitia = User::getUserById($id);
        $statusUser = [
            'admin', 'superadmin'
        ];
        return view('Admin.ManagementUsers.PanitiaUsers.edit', compact('statusUser', 'dataPanitia'));
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
        return view('Admin.ManagementUsers.PutraUsers.edit', compact('statusUser', 'dataPutra'));
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
            return redirect('/users')->with('failed', 'Terjadi kesalahan' . $e->getMessage());
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
            return redirect('/users')->with('failed', 'Terjadi kesalahan' . $e->getMessage());
        }
    }

    /**
     * func tambah data user panitia :redirectResponse
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
            return redirect('/users')->with('failed', 'Terjadi kesalahan' . $e->getMessage());
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
                'level' => $request->updateLevel,
            ];
            User::updateUser($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan' . $e->getMessage());
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
                'level' => $request->updatePutraLevel,
            ];
            User::updateUserPutra($data, $id);
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
            User::deleteUser($id);
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
            User::deleteUserPanitia($id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan' . $e->getMessage());
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
}
