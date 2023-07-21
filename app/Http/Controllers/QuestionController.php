<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Ticket;
use App\User;
use App\Score;
use Log;

class QuestionController extends Controller
{
    public function pretest(Request $request) {
        $id_ticket = $request->ticket_id;
        $id_section = $request->section_id;
        
        $score = Score::create([
            'ticket_id'     => $id_ticket,
            'section_id'    => $id_section,
            'correct'       => $request->correct,
            'wrong'         => $request->wrong,
            'not_answered'  => $request->not_answered,
            'type'          => 0,
            'examines'       => 0,
        ]);

        return response()->json($score);
    }

    public function posttest(Request $request) {
        $id_ticket = $request->ticket_id;
        $id_module = $request->module_id;
        $list_answer = $request->list_answer;
        $list_answer_user = $request->list_answer_user;

        $correct = 0;
        $wrong = 0;
        $not_answered = 0;

        for ($i = 0; $i < count($list_answer); $i++) {
            if ($list_answer[$i] == $list_answer_user[$i]) {
                $correct++;
            } else if ($list_answer_user[$i] == '0') {
                $not_answered++;
            } else {
                $wrong++;
            }
        }

        $total = HelperController::scoring($correct, $wrong, $not_answered);

        $score = Score::create([
            'ticket_id'     => $id_ticket,
            'module_id'     => $id_module,
            'correct'       => $correct,
            'wrong'         => $wrong,
            'not_answered'  => $not_answered,
            'type'          => 0,
            'examines'      => 0,
        ]);

        return response()->json(["data" => $score, "total" => $total, "code" => 200]);
    }

    public function postSubmitScoreSertifikasi(Request $request) {

        $id_ticket = $request->ticket_id;
        $id_module = $request->module_id;
        $list_answer = $request->list_answer;
        $list_answer_user = $request->list_answer_user;

        $correct = 0;
        $wrong = 0;
        $not_answered = 0;

        for ($i = 0; $i < count($list_answer); $i++) {
            if ($list_answer[$i] == $list_answer_user[$i]) {
                $correct++;
            } else if ($list_answer_user[$i] == '0') {
                $not_answered++;
            } else {
                $wrong++;
            }
        }

        $total = HelperController::scoring($correct, $wrong, $not_answered);

        $score = Score::create([
            'ticket_id'     => $id_ticket,
            'module_id'     => $id_module,
            'correct'       => $correct,
            'wrong'         => $wrong,
            'not_answered'  => $not_answered,
            'type'          => 1,
            'examines'      => 0,
        ]);

        return response()->json(["data" => $score, "total" => $total, "code" => 200]);
    }
}
