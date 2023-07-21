<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Module;
use App\User;
use App\Ticket;
use App\KodeSertifikasi;
use App\Sertifikasi;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;
use Validator, Redirect, Auth, Log;

class SertifikasiController extends Controller
{
    public function getSertifikasi(Request $request) {
        $current_user = Auth::user();
        $list_answer = array();

        if ($request->id == NULL) {
            return redirect()->route('loginSertifikasi');
        }

        $ticket = Ticket::with('module.question')
            ->where('user_id', $current_user->id)
            ->where('kode_sertifikasi_id', $request->id)
            ->first();

        if ($ticket == NULL) {
            return redirect()->route('loginSertifikasi');
        }

        // $question = $ticket->module->question->shuffle();
        $question = $ticket->module->question
                // ->whereIn('ticket_type_id', [1, 2, 3])
                ->where('ticket_type_id', '=' , $ticket->ticket_type_id)
                ->shuffle();

        foreach($question as $item) {
            $list_answer[] = $item->answer;
        }

        return view('sertifikasi/sertifikasi', [
            'ticket'        => $ticket,
            'list_answer'   => $list_answer,
            'question'      => $question
        ]);
    }

    public function loginSertifikasi() {
        if(Auth::user()) {
            Auth::logout();
        }

        $modules = Module::all();

        return view('sertifikasi/login', [
            'modules'   => $modules,
        ]);
    }

    public function postLoginSertifikasi(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'email'             => 'required',
            'sertifikasi'       => 'required',
            // 'kode'              => 'required|exists:kode_sertifikasi,kode,status,1'
            'kode'              => 'required'
        ], HelperController::errorMessageLoginSertifikasi());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $kode_sertifikasi = KodeSertifikasi::with('module')
            ->where('kode', $request->kode)
            ->where('status', 1)
            ->first();

        if ($kode_sertifikasi == NULL) {
            alert()->warning('Warning', 'Kode sertifikasi yang anda masukkan salah.');
            // alert()->success('Sukses!', 'Peserta berhasil ditambahkan');
            return Redirect::back();
        }

        $user = User::where('email', $request->email)->first();
        if ($user == NULL) {
            $user = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => bcrypt('123456'),
                'status_id'         => 2,
                'free_ticket_taken' => 0,
            ]);
        }

        Auth::loginUsingId($user->id, true);

        $ticket = Ticket::where('user_id', $user->id)
            ->where('kode_sertifikasi_id', $kode_sertifikasi->id)
            ->first();
        if ($ticket == NULL) {
            $ticket = Ticket::create([
                'modul_id'              => $kode_sertifikasi->module->id,
                'user_id'               => $user->id,
                'ticket_type_id'        => 3,
                // 'kode_sertifikasi_id'   => $kode_sertifikasi->id,
                'start_date'            => NULL,
                'end_date'              => NULL,
                'progress_in_module'    => 1,
                'sertifikasi_chance'    => 3,
                'hot_chance'            => 3,
                'progress_in_section'   => 0
            ]);
            $ticket->kode_sertifikasi_id = $kode_sertifikasi->id;
            $ticket->save();
        }

        $sertifikasi = Sertifikasi::where('user_id', $user->id)
            ->where('kode_sertifikasi_id', $kode_sertifikasi->id)
            ->first();
        if ($sertifikasi == NULL) {
            $sertifikasi = Sertifikasi::create([
                'user_id'               => $user->id,
                'kode_sertifikasi_id'   => $kode_sertifikasi->id
            ]);
        }

        return redirect('/sertifikasi?id='.$kode_sertifikasi->id);
    }

    public function postLogOutSertifikasi() {
        Auth::logout();

        return response()->json("logout");
    }

    public function getSertifikasiForUser(Request $request) {
        $current_user = Auth::user();
        $list_answer = array();

        $ticket = Ticket::with('module.question')
            ->where('id', $request->id_ticket)
            ->first();

        $question = $ticket->module->question
                // ->whereIn('ticket_type_id', [1, 2, 3])
                ->where('ticket_type_id', '=' , $ticket->ticket_type_id)
                ->shuffle();

        foreach($question as $item) {
            $list_answer[] = $item->answer;
        }

        return view('sertifikasi/sertifikasi', [
            'ticket'        => $ticket,
            'list_answer'   => $list_answer,
            'question'      => $question
        ]);
    }

    public function postAjaxSertifikasiUser(Request $request) {
        $kode_sertifikasi = KodeSertifikasi::where('kode', $request->kode_sertifikasi)
            ->where('status', 1)
            ->first();

        if ($kode_sertifikasi == NULL) {
            return response()->json(["code" => 400]);
        }

        $ticket = Ticket::where('id', $request->ticket_id)->first();

        if ($kode_sertifikasi->module_id != $ticket->modul_id) {
            return response()->json(["code" => 400]);
        }
        
        $ticket->kode_sertifikasi_id = $kode_sertifikasi->id;

        $temp_int = 0;
        if ($request->status == 'sertifikasi') {
            if ($ticket->sertifikasi_chance <= 0) {
                alert()->warning('Perhatian', 'Anda sudah melakukan Test ini lebih dari 3 kali');
                return redirect()->back();
            }
            $temp_int = $ticket->sertifikasi_chance;
            $temp_int -= 1;

            $ticket->sertifikasi_chance = $temp_int;
        } else {
            if ($ticket->hot_chance <= 0) {
                alert()->warning('Perhatian', 'Anda sudah melakukan Test ini lebih dari 3 kali');
                return redirect()->back();
            }
            $temp_int = $ticket->hot_chance;
            $temp_int -= 1;

            $ticket->hot_chance = $temp_int;
        }

        $ticket->save();

        return response()->json(["code" => 200, "data" => $kode_sertifikasi]);
    }
}
