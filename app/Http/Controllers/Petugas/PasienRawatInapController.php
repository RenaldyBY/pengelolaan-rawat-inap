<?php

namespace App\Http\Controllers\Petugas;

use App\Exports\PasienExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasienRawatInapRequest;
use App\Imports\PasienImport;
use App\Models\Kamar;
use App\Models\PasienRawatInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Excel;
use Validator;

class PasienRawatInapController extends Controller
{
    public function index()
    {
        $data['items'] = PasienRawatInap::all();
        return view('petugas.pasienrawatinap.index')->with($data);
    }

    public function create()
    {
        $data['kamars'] = Kamar::all();
        return view('petugas.pasienrawatinap.create')->with($data);
    }

    public function store(PasienRawatInapRequest $request)
    {
        $data = $request->all();
        PasienRawatInap::create($data);
        Session::flash('status', 'Data Berhasil Dimasukkan');
        return redirect()->route('petugas.pasienrawatinap.index');
    }

    public function show(PasienRawatInap $pasienRawatInap)
    {
        //
    }

    public function edit($id)
    {
        $data['item'] = PasienRawatInap::findOrFail($id);
        $data['kamars'] = Kamar::all();
        return view('petugas.pasienrawatinap.edit')->with($data);
    }

    public function update(PasienRawatInapRequest $request, $id)
    {
        $data = $request->all();
        $item = PasienRawatInap::findOrFail($id);
        $item->update($data);
        Session::flash('status', 'Data Berhasil Diubah');
        return redirect()->route('petugas.pasienrawatinap.index');
    }

    public function destroy($id)
    {
        // PasienRawatInap::onlyTrashed()->findOrFail($id)->forceDelete();
        $pasien = PasienRawatInap::findOrFail($id);
        $pasien->delete();
        Session::flash('status', 'Data Berhasil Dihapus');
        return redirect()->route('petugas.pasienrawatinap.index');
    }

    public function getPasien(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasien_rawat_inaps,id'
        ]);
        $pasien = PasienRawatInap::with('kamar')->where('id', $request->pasien_id)->get();
        return response()->json($pasien);
    }

    public function export_pasien()
    {
        return Excel::download(new PasienExport, 'pasien.xlsx');
    }
    public function import_pasien(Request $request)
    {
        $validator = Validator::make(
        [
            'file'      => $request->file('file_pasien'),
            'extension' => strtolower($request->file('file_pasien')->getClientOriginalExtension()),
        ],
        [
            'file'          => 'required',
            'extension'      => 'required|in:xlsx,xls',
        ]);
        
        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return redirect()->route('petugas.pasienrawatinap.index');
        }

        Excel::import(new PasienImport, $request->file('file_pasien'));
        Session::flash('status', 'Import Berhasil');
        return redirect()->route('petugas.pasienrawatinap.index');    
    }
}
