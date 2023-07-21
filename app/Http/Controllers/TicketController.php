<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Ticket;
use App\Section;
use App\User;
use App\CompanyUser;
use Log;

class TicketController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */

    public function index()
    {
        $tickets = DB::table('ticket')->get();
        $idticket = $tickets->id;

        return view('ticket.index', ['ticket' => $tickets,
                                    'idticket' => $idticket
        ]);
    }
    // public static function getJumlahFreeTiketTersedia() {
    //     $nFreeTicket = DB::table('tickets')
    //         ->where('user_id', 0)
    //         ->where('ticket_type_id', 1)
    //         ->get();

    //     \View::share('nFreeTicket', $nFreeTicket);
    // }
    public static function getAFreeTicketID() {
        $idFreeTicket = DB::table('tickets')
            ->where('user_id', 0)
            ->where('ticket_type_id', 1)
            ->first()
            ->id;

        return $idFreeTicket;
    }
    public static function updateKepemilikanTiket($tiket_id, $user_id) {
        DB::table('tickets')
            ->where('id', $tiket_id)
            ->update(['user_id' => $user_id]);
    }
    public static function isUserTelahPunyaFreeTicket($user_id) {
        $nFreeTicket = DB::table('tickets')
            ->where('user_id', $user_id)
            ->where('ticket_type_id', 1)
            ->count();

        return ($nFreeTicket > 0);
    }
    public static function getJumlahTicketYangDimiliki($modul_id, $user_id)
    {
        $nTicket = DB::table('tickets')
            ->where('modul_id', $modul_id)
            ->where('user_id', $user_id)
            ->count();

        return $nTicket;
//        return view('modul' ,compact('nTicket'));
    }

    public function send(Request $request) {
        $user = User::where('email', $request->email)->first();
        $ticket = Ticket::where('id', $request->ticket)->first();

        $ticket->user_id = $user->id;
        $ticket->save();

        return response()->json($ticket);
    }

    public function postAjaxPresentation(Request $request){
        // $section = Section::with('video')
        //     ->where('id', $request->section_id)->first();

        // return response()->json($section);

        $section = Section::where('id', $request->section_id)->first();

        return response()->json($section);
    }

    public function postAjaxVideo(Request $request){;
        $section = Section::where('id', $request->section_id)->first();

        return response()->json($section);
    }

    public function activate($id_ticket) {
        $ticket = Ticket::where('id', $id_ticket)->first();

        $ticket->progress_in_module = 1;
        $ticket->progress_in_section = 1;
        $ticket->save();

        \Log::info($ticket);

        //return response()->json($ticket);
        return $ticket;
    }

    public function update_ticket($id_ticket) {
        $ticket = Ticket::where('id', $id_ticket)->first();

        $temp = $ticket->progress_in_module;
        $temp += 1;
        $ticket->progress_in_module = $temp;

        $temp = $ticket->progress_in_section = 1;
        $ticket->save();

        \Log::info($ticket);

        return response()->json($ticket);
    }

    public function update_ticket_section($id_ticket) {
        $ticket = Ticket::where('id', $id_ticket)->first();

        $temp = $ticket->progress_in_section;
        $temp += 1;
        $ticket->progress_in_section = $temp;

        $ticket->save();

        return response()->json($ticket);
    }

    public function free_ticket(Request $request) {
        $user_id = \Auth::user()->id;
        $id_free_ticket = DB::table('tickets')
                            ->where('user_id', 0)
                            ->where('ticket_type_id', 1)
                            ->first()
                            ->id;

        $ticket = DB::table('tickets')
                    ->where('id', $id_free_ticket)
                    ->update(['user_id' => $user_id]);

        $user = User::where('id', $user_id)->first();
        $user->free_ticket_taken = 1;
        $user->save();

        return response()->json($ticket);
    }

    public function send_all(Request $request) {
        $ticket = Ticket::where('modul_id', $request->module)
                        ->where('user_id', \Auth::user()->id)
                        ->where('progress_in_module', 0)
                        ->get();
        
        $company_user = CompanyUser::where('company_id', $request->company)
                            ->where('status_company_id', 2)
                            ->whereNotIn('acceptance_status', [-1])
                            ->with('user')
                            ->get();

        $n = $company_user->count();

        for ($i = 0; $i < $n; $i++) {
            $ticket[$i]->user_id = $company_user[$i]->user_id;
            $ticket[$i]->save();
            // \Log::info($ticket[$i]);
        }

        return response()->json($ticket);
    }

}