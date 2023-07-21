<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\HotScore;
use Auth;

class HighOrderThinkingController extends Controller
{
    public function getHighOrderThinking($id_ticket) {
        $current_user = Auth::user();
        $list_answer = array();


        $ticket = Ticket::with('module.hot_question')
            ->where('id', $id_ticket)
            ->first();

        // $score = HotScore::where('ticket_id', $id_ticket)
        //     ->get();
        // if (count($score) >= 3) {
        //     alert()->warning('Perhatian', 'Anda sudah melakukan Test ini lebih dari 3 kali');
        //     return redirect()->back();
        // }

        $hot_question = $ticket->module->hot_question
            // ->where('ticket_type_id', '<=', $ticket_type)
            ->shuffle();
        
        foreach($hot_question as $item) {
            $list_answer[] = $item->answer;
        }

        return view('user-pages/hot', [
            'ticket'            => $ticket,
            'hot_question'      => $hot_question,
            'list_answer'       => $list_answer,
        ]);
    }

    public function postHighOrderThinking(Request $request) {
        $id_ticket = $request->ticket_id;
        $list_answer = $request->list_answer;
        $list_answer_user = $request->list_answer_user;

        $total = HelperController::hot_scoring($list_answer, $list_answer_user);

        // $score = Score::create([
        //     'ticket_id'     => $id_ticket,
        //     'module_id'     => $id_module,
        //     'correct'       => $correct,
        //     'wrong'         => $wrong,
        //     'not_answered'  => $not_answered,
        //     'type'          => 0,
        //     'examines'      => 0,
        // ]);

        $hot_score = HotScore::create([
            'ticket_id'     => $id_ticket,
            'total'         => $total
        ]);

        return response()->json(["data" => $hot_score, "code" => 200]);
    }
}
