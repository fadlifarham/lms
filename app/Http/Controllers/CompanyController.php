<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\CompanyUser;
use App\Ticket;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\ToSweetAlert;
use Auth, Log;

class CompanyController extends Controller
{
    public function create(Request $request) {
        $company = Company::create([
            'module_id'         => $request->module,
            'ticket_type_id'    => $request->jenis,
            'name'              => $request->name,
            'code'              => str_random(5),
        ]);

        $companyuser = CompanyUser::create([
            'user_id'           => \Auth::user()->id,
            'company_id'        => $company->id,
            'status_company_id' => 1,
            'acceptance_status' => 0,
        ]);
        
        return redirect()->route('list-company');
    }

    public function member(Request $request) {
        $my_company = CompanyUser::where('user_id', \Auth::user()->id)
                                ->where('status_company_id', 1)
                                ->with('company.module')
                                ->get();

        // \Log::info($request);

        $my_user = CompanyUser::where('company_id', $request->company)
                                ->where('status_company_id', 2)
                                ->whereNotIn('acceptance_status', [-1])
                                ->with('user')
                                ->get();

        $my_ticket = Ticket::where('user_id', \Auth::user()->id)
                            ->where('progress_in_module', 0)
                            ->with('module')
                            // ->unique('user_id')
                            ->get();
        
        return view('user-pages/company-list-user', [
            'my_company'  => $my_company,
            'my_user'     => $my_user,
            'my_ticket'   => $my_ticket,
        ]);
    }

    public function join(Request $request) {
        $company = Company::where('code', $request->code)->first();

        $company_user = CompanyUser::create([
            'user_id'               =>  Auth::user()->id,
            'company_id'            => $company->id,
            'status_company_id'     => 2,
            'acceptance_status'     => 0,
        ]);

        return redirect()->route('home');
    }

    public function invite_member(Request $request) {
        $this->validate($request, [
            'email' => 'required',
        ]);

        // try {
            $user = User::where('email', $request->email)->first();

            if ($user == NULL) {
                alert()->warning('Warning', 'Email peserta tidak terdapat pada database');
                return redirect()->back();
            }

            $company = Company::where('id', $request->company_id)
                ->with('module')
                ->first();

            $ticket = Ticket::where('user_id', \Auth::user()->id)
                ->where('modul_id', $company->module->id)
                ->where('ticket_type_id', $company->ticket_type_id)
                ->where('progress_in_module', 0)
                ->first();

            if ($ticket == NULL) {
                alert()->warning('Warning', 'Anda tidak memiliki ticket');
                return redirect()->back();
            }

            $company_user = CompanyUser::where('user_id', $user->id)
                ->where('company_id', $request->company_id)
                ->where('status_company_id', 2)
                ->get();
            
            if ($company_user->count() != NULL) {
                alert()->warning('Warning', 'Peserta sudah ditambahkan');
                return redirect()->back();
            } else {
                $company_user = CompanyUser::create([
                    'user_id'               => $user->id,
                    'company_id'            => $request->company_id,
                    'status_company_id'     => 2,
                ]);
            }

            $ticket->user_id = $user->id;
            $ticket->company_user_id = $company_user->id;
            $ticket->save();

        // } catch (\Throwable $th) {
        //     // $validator = \Validator::make([], []); // Empty data and rules fields
        //     // $validator->errors()->add('email', 'Email tidak tersedia');
        //     // throw new ValidationException($validator);
        //     alert()->warning('Warning', 'Email peserta tidak terdapat pada database');
        //     return redirect()->back();
        //     // \Log::info(Alert);
        // }

        alert()->success('Sukses!', 'Peserta berhasil ditambahkan');

        return redirect()->route('invite-user-company/', $request->company_id);
    }

    public function postAjaxVerifyClass(Request $request) {
        $ticket = Ticket::where('modul_id', $request->module)
            ->where('ticket_type_id', $request->jenis)
            ->get();

        return response()->json(['jumlah' => count($ticket)]);
    }
}
