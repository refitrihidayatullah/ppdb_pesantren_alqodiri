<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
// use Excel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Imports\ProvinsiImport;
use App\Models\Kabupaten;
use Illuminate\Cache\RedisStore;
use App\Validators\ValidatorRules;
use Maatwebsite\Excel\Facades\Excel;

class DashboardSantriController extends Controller
{
    public function index(): View
    {
        return view('Santri.Dashboard.index');
    }
    public function formPendaftaran(): View
    {
        return view('Santri.FormPendaftaran.index');
    }
    public function storePendaftaran(Request $request)
    {
        $validation = ValidatorRules::formulirRules($request->all());
        if ($validation->fails()) {
            return redirect('/form-pendaftaran')->withErrors($validation)->with('message', 'failed')->withInput();
        }
        return 'hello';
    }
    public function provinsi(): View
    {
        return view('Santri.FormPendaftaran.provinsi');
    }
    public function storeProvinsi(Request $request)
    {
        // dd($request->all());
        Excel::import(new ProvinsiImport, $request->file('import_file'));
        // $test =   Excel::import(new ProvinsiImport, $request->file('provinsi'));
        return redirect()->back()->with('message', 'success');
        // dd($test);
        // (new ProvinsiImport)->import('provinsi.csv', null, \Maatwebsite\Excel\Excel::CSV);
    }

    //select option wilayah indonesia
    public function selectProvinsi()
    {
        $data = Provinsi::where('name', 'LIKE', '%' . request('q') . '%')->paginate(10);
        response()->json($data);
    }
    public function selectKabupaten($id)
    {
        $data = Kabupaten::where('provinsi_id', $id)->where('name', 'like', '%' . request() . '%')->paginate(10);
        return response()->json($data);
    }
}
