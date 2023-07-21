<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KodeSertifikasi;
use App\Module;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;
use App\Sertifikasi;
use Redirect;

class AdminSertifikasiController extends Controller
{
    public function getAdminSertifikasi() {
        $module = Module::all();
        $kode_sertifikasi = KodeSertifikasi::with('module')->get();

        return view('admin/sertifikasi', [
            'module'    => $module,
            'kode_sertifikasi'  => $kode_sertifikasi
        ]);
    }

    public function postAjaxCreateSertifikasi(Request $request) {
        $kode_sertifikasi = KodeSertifikasi::where('kode', $request->kode)->first();
        if ($kode_sertifikasi != NULL) {
            alert()->warning('Warning', 'Kode sertifikasi sudah terdaftar di database.');
            return redirect()->back();
        }

        $kode_sertifikasi = KodeSertifikasi::create([
            'module_id'     => $request->module_id,
            'kode'          => $request->kode,
            'status'        => 1,
            'training_date' => $request->training_date
        ]);

        return response()->json($kode_sertifikasi);
    }

    public function getAdminCurrentSertifikasi($kode_sertifikasi_id, Request $request) {
        $sertifikasi = Sertifikasi::with('user')
            ->where('kode_sertifikasi_id', $kode_sertifikasi_id)
            ->get();

        return view('admin/list-member-sertifikasi', [
            'sertifikasi'   => $sertifikasi 
        ]);
    }
}
