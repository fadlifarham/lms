<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CompanyUser;

class ReviewInvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accept(Request $request) {
        $company_user = CompanyUser::where('id', $request->id)->first();

        if ($request->input('action') == 'terima') {
            $company_user->acceptance_status = 1;
        } else {
            $company_user->acceptance_status = -1;
        }
        $company_user->save();

        return redirect('/list-user-company');
    }

    public function reject(Request $request) {
        // $user = User::where('id', $request->id)->first();

        // $user->acceptance_status = -1;
        // $user->save();

        // return redirect('/dashboard');
    }
}
