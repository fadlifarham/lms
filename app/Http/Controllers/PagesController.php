<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\User;
use App\Company;
use App\CompanyUser;
use App\Ticket;
use App\Module;
use App\Score;
use App\Reference;
use App\TicketType;
use App\ModuleCategory;
use App\HotScore;
use App\Http\Controllers\TicketController;
use Storage;
use Alert, Log, Auth, DB;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        // $json = Storage::disk('local')->get('content.json');
        $json = file_get_contents(base_path('resources/views/content.json'));
        $json = json_decode($json, true);

        \View::share('content', $json);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = \Auth::user()->status_id;
        $company_id = \Auth::user()->company_id;

        $list_user = User::where('company_id', $company_id)
                            ->where('status_id', 2)
                            ->where('acceptance_status', 1)
                            ->get();
        
        $code_corporation = Company::where('id', $company_id)->first()->code;
        $name = Company::where('id', $company_id)->first()->name;

        return view('user-pages/dashboard', [
            'status'            => $status,
            'list_user'         => $list_user,
            'code_corporation'  => $code_corporation,
            'name'              => $name
        ]);
    }

    public function home(){
        $status = \Auth::user()->status_id;
        return view('user-pages/home', [
            'status'            => $status,
        ]);
    }

    public function module() {
        $status = \Auth::user()->status_id;
        $free_ticket_taken = \Auth::user()->free_ticket_taken;

        $kategori = ModuleCategory::with('module')->get();
        return view('user-pages/module', [
            'status'                => $status,
            'free_ticket_taken'     => $free_ticket_taken,
            'kategori'              => $kategori,
        ]);
    }

    public function review_invitation() {
        $company_id = \Auth::user()->company_id;
        $status = \Auth::user()->status_id;
        
        $users = User::where('company_id', $company_id)
                    ->where('status_id', 2)
                    ->where('acceptance_status', 0)
                    ->get();

        return view('user-pages/review-invitation', [
            'users'     => $users,
            'status'    => $status
        ]);
    }

    public function ticket() {
        $status = \Auth::user()->status_id;
        $count_tickets = array();

        // $tickets = Ticket::where('user_id', \Auth::user()->id)
        //     ->with('ticket_type')
        //     ->with('module')
        //     ->get()
        //     ->unique('modul_id')
        //     ->unique('ticket_type_id');
        
        // foreach($tickets as $ticket){
        //     $count_ticket = Ticket::where('user_id', \Auth::user()->id)
        //                 ->where('progress_in_module', '0')
        //                 ->where('modul_id', $ticket->modul_id)
        //                 ->with('ticket_type')
        //                 ->with('module')
        //                 ->get()
        //                 ->count();
        //     $count_tickets[] = $count_ticket; 
        // }

        $tickets = Ticket::select('id', 'modul_id', 'ticket_type_id', 'progress_in_module', DB::raw('COUNT(id) as jumlah'))
            ->where('user_id', \Auth::user()->id)
            // ->with('ticket_type')
            // ->with('module')
            ->groupBy('modul_id')
            ->groupBy('ticket_type_id')
            // ->orderBy('ticket_type_id', 'asc')
            ->get();

        return view('user-pages/ticket', [
            'tickets' => $tickets,
            'status'  => $status,
            // 'count_tickets' => $count_tickets
        ]);
        //return $tickets;
    }

    public function trainingSaya() {
        $status = \Auth::user()->status_id;
        
        $tickets = Ticket::where('user_id', \Auth::user()->id)
                        ->where('progress_in_module', ">", 0)
                        ->with('ticket_type')
                        ->with('module.section')
                        ->get();

        return view('user-pages/training-saya',[
            'tickets' => $tickets,
            'status'  => $status
        ]);
    }

    public function some_ticket($id_ticket, $id_section) {
        $status = \Auth::user()->status_id;

        $ticket = Ticket::where('id', $id_ticket)
                        ->with('module.section.video')
                        ->first();
        
        $section = $ticket->module->section->where('id', $id_section)->first();
        $video = $section->video;

        $overview = $video->where('type', 0)->first();
        $learn_video = $video->where('type', 1)->first();
        
        // $videos = $ticket->module->video;

        // $overview = $videos->where('type', 0)->first();
        // $learn_video = $videos->where('type', 1);

        return view('user-pages/some-ticket', [
            'id_section'    => $id_section,
            'status'        => $status,
            'ticket'        => $ticket,
            'section'       => $section,
            'overview'      => $overview,
            'learn_video'   => $learn_video,
        ]);
    }

    public function pretest($id_ticket, $id_section) {
        $status = \Auth::user()->status_id;
        $ticket = Ticket::where('id', $id_ticket)
                        ->with('module.section.question')
                        ->first();

        $section = $ticket->module->section->where('id', $id_section)->first();

        return view('user-pages/pretest', [
            'id_section' => $id_section,
            'status' => $status,
            'ticket'    => $ticket,
            'section'   => $section
        ]);
    }

    public function examines($id_ticket, $id_section) {
        $status = \Auth::user()->status_id;
        $ticket = Ticket::where('id', $id_ticket)
                        ->with('module.section.question')
                        ->first();

        $section = $ticket->module->section->where('id', $id_section)->first();

        return view('user-pages/examines', [
            'id_section' => $id_section,
            'status' => $status,
            'ticket'    => $ticket,
            'section'   => $section
        ]);
    }

    public function posttest($id_ticket, $id_section) {
        $status = Auth::user()->status_id;
        $current_user = Auth::user();
        $list_answer = array();

        $ticket = Ticket::with('module.question')
            ->where('id', $id_ticket)
            ->first();

        if ($ticket == NULL) {
            // return redirect()->route('loginSertifikasi');
        }

        if ($ticket->ticket_type_id == 4 OR $ticket->ticket_type_id == 3) {
            $ticket_type = $ticket->ticket_type_id - 1;
        } else {
            $ticket_type = $ticket->ticket_type_id;
        }

        // if ($ticket->time_end_latihan == NULL) {
        //     $ticket->time_end_latihan = date("Y-m-d H:i:s", strtotime('+2 hours'));
        // }

        $question = $ticket->module->question
            ->where('ticket_type_id', '<=', $ticket_type)
            ->shuffle();
        
        foreach($question as $item) {
            $list_answer[] = $item->answer;
        }

        return view('user-pages/posttest', [
            'status'    => $status,
            'ticket'    => $ticket,
            'list_answer'   => $list_answer,
            'question'      => $question
        ]);
    }

    public function section($id) {
        $status = Auth::user()->status_id;
        $list_jenis = array();
        
        $ticket = Ticket::with('module.section')
            ->where('id', $id)
            ->first();
        $temp = $ticket->ticket_type_id;
        
        do {
            $list_jenis[] = $temp;
            $temp--;
        } while($temp != 0);

        $section = $ticket->module->section->whereIn('ticket_type_id', $list_jenis);

        $referensi = Reference::where('module_id', $ticket->module->id)
            ->get();

        $score_latihan = Score::where('ticket_id', $id)
            ->where('type', 0)
            ->orderBy('created_at', 'desc')
            ->first();

        $score_sertifikasi = Score::where('ticket_id', $id)
            ->where('type', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($score_latihan == NULL) {
            $result_latihan = NULL;
        } else {
            $result_latihan = HelperController::scoring(
                $score_latihan->correct,
                $score_latihan->wrong,
                $score_latihan->not_answered
            );

            $result_latihan = "" . $result_latihan . "";
        }
        if ($score_sertifikasi == NULL) {
            $result_sertifikasi = NULL;
        } else {
            $result_sertifikasi = HelperController::scoring(
                $score_sertifikasi->correct,
                $score_sertifikasi->wrong,
                $score_sertifikasi->not_answered
            );

            $result_sertifikasi = "" . $result_sertifikasi . "";
        }

        $score_hot = HotScore::where('ticket_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
        
        // $result_hot = NULL;
        // if ($score_hot != NULL) {
        //     $result_hot = $score_hot->total;
        // }
       
        return view('user-pages/modules', [
            'status'                => $status,
            'ticket'                => $ticket,
            'section'               => $section,
            'referensi'             => $referensi,
            'result_latihan'        => $result_latihan,
            'result_sertifikasi'    => $result_sertifikasi,
            'score_hot'             => $score_hot,
        ]);
    }

    public function petunjuk() {
        $status = \Auth::user()->status_id;

        return view('user-pages/petunjuk', [
            'status'    => $status,
        ]);
    }

    public function not_found() {
        $status = \Auth::user()->status_id;

        return view('404', [
            'status'    => $status,
        ]);
    }

    public function create_company() {
        $modul = Module::with('ticket')->get();

        return view('user-pages/company-create', [
            'modul'         => $modul,
        ]);
    }

    public function list_company() {
        $my_company = CompanyUser::where('user_id', \Auth::user()->id)
                                ->where('status_company_id', 1)
                                ->with('company')
                                ->get();
        
        return view('user-pages/company-list', [
            'my_company'   => $my_company,
        ]);
    }

    public function invite_member($id){
        $company = Company::where('id', $id)
            ->with('module')
            ->first();

        $users = User::with('company_user')

            ->whereHas('company_user', function ($query) use($id) {
                $query->where('status_company_id', 2);
                $query->where('company_id', $id);
            })
            ->get();

        $tickets = Ticket::where('user_id', \Auth::user()->id)
            ->where('modul_id', $company->module->id)
            ->where('ticket_type_id', $company->ticket_type_id)
            ->where('progress_in_module', 0)
            ->get();

        return view('user-pages.company-invite-user', [
            'company'   => $company,
            'id'        => $id,
            'users'     => $users,
            'tickets'   => $tickets,
        ]);
    }

    public function list_user_company() {
        $my_company = CompanyUser::where('user_id', \Auth::user()->id)
                                ->where('status_company_id', 1)
                                ->with('company')
                                ->get();
        // $company_user = CompanyUser::with('user')->get();

        return view('user-pages/company-list-user', [
            'my_company'  => $my_company,
            'my_user'     => collect(),
            'my_ticket'   => collect(),
        ]);
    }

    public function join_company() {
        return view('user-pages/company-join', [

        ]);
    }

    public function errorNotFound() {
        return view('user-pages/not-found', [

        ]);
    }
}
