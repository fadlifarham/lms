<?php

namespace App\Http\Controllers;
use App\User;
use App\Company;
use App\Purchase;
use App\Ticket;
use App\CompanyUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        // $name = \Auth::user()->name;
        return view('admin.dashboard', [
            // 'name' => $name
        ]);
    }

    public function userlist(){
        $status = \Auth::user()->status_id;
        $myid = \Auth::user()->id;
        //$user = User::all();
        $user = User::with('status')->get();
        //$company = Company::where('id', $user->company_id)->get();
        //$nama_company = $company->name;
        //$status = Status::where('id', $user->status_id)->get();
        //$status_user = $status->name;
        return view('admin.userlist', [
            'user'          => $user,
            'status'        => $status,
            'myid'          => $myid,
            //'nama_company'  => $company,
            //'status_user'   => $status_user,
        ]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function companylist(){
        $status = \Auth::user()->status_id;
        //$user = User::all();
        $company = Company::all();
        //$company = Company::where('id', $user->company_id)->get();
        //$nama_company = $company->name;
        //$status = Status::where('id', $user->status_id)->get();
        //$status_user = $status->name;
        
        return view('admin.companylist', [
            'company'       => $company,
            'status'        => $status,
            //'nama_company'  => $company,
            //'status_user'   => $status_user,
        ]);
    }

    public function participantlist(){
        $status = \Auth::user()->status_id;
        //$user = User::all();
        $ticket = Ticket::with('user')->get();
        $ticket = Ticket::with('module')->get();
        //$company = Company::where('id', $user->company_id)->get();
        //$nama_company = $company->name;
        //$status = Status::where('id', $user->status_id)->get();
        //$status_user = $status->name;
        return view('admin.participantlist', [
            'ticket'    => $ticket,
            'status'    => $status,
            //'nama_company'  => $company,
            //'status_user'   => $status_user,
        ]);
    }
    public function payment_validation() {
        $purchases = Purchase::with('user')
            ->with('module')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin/payment-validation', [
            'purchases' => $purchases,
        ]);
    }

    public function validate_payment(Request $request) {
        $purchase = Purchase::where('id', $request->id)->first();
        $purchase->status = 1;
        $purchase->save();

        $n = $purchase->total_ticket;

        for ($i = 0; $i < $n; $i++) {
            Ticket::create([
                'modul_id'              => $purchase->module_id,
                'user_id'               => $purchase->user_id,
                'ticket_type_id'        => $purchase->ticket_type_id,
                'start_date'            => NULL,
                'end_date'              => NULL,
                'progress_in_module'    => 0,
                'sertifikasi_chance'    => 3,
                'hot_chance'            => 3,
                'progress_in_section'   => 0,
            ]);
        }

        return redirect('admin/payment-validation');
    }

    public function postAjaxEditUserList(Request $request) {
        $user = User::where('id', $request->user_id)->first();

        $user->status_id = $request->status_id;
        $user->save();

        return response()->json(['code' => 200]);
    }

    public function daftarPeserta($company_id, Request $request) {

        $peserta = Ticket::with('company_user')
            ->whereHas('company_user', function($query) use ($company_id) {
                $query->where('company_id', $company_id);
            })
            ->with('user')
            ->with('score')
            ->with('hot_score')
            ->get();

        $company = Company::where('id', $company_id)->first();

        return view('admin/daftar-peserta', [
            'peserta'   => $peserta,
            'company'   => $company
        ]);
        
    }
    
    public function daftarNilai() {
        return view('admin/daftar-nilai');
    }
}
