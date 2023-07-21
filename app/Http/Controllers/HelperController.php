<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class HelperController extends Controller
{
    public static function scoring($benar, $salah, $no_answer){
        $nilai_benar = $benar * 1;
        $nilai_salah = $salah * 0;
        $tidak_dijawab     = $no_answer * 0;
        $total = ( $nilai_benar + $nilai_salah + $tidak_dijawab ) / ($benar + $salah + $no_answer) * 100;

        return round($total);
    }
    
    public static function errorMessageLoginSertifikasi() {
        $messages = [
            'name.required'             => 'Nama harus diisi',
            'email.required'            => 'Email harus diisi',
            'sertifikasi.required'      => 'Sertifikasi harus dipilih',
            'kode_sertifikasi.required' => 'Kode sertifikasi harus di isi',
            'kode_sertifikasi.exists'   => 'Kode sertifikasi tidak tersedia'
        ];
        
        return $messages;
    }

    public static function waktuLatihan() {
        $jam = 1;
        $menit = 0;

        return array($jam, $menit);
    }

    public static function waktuSertifikasi() {
        $jam = 2;
        $menit = 0;

        return array($jam, $menit);
    }

    public static function waktuHighOrderThinking() {
        $jam = 3;
        $menit = 0;

        return array($jam, $menit);
    }

    public static function hot_scoring($list_answer, $list_answer_user) {
        $sum = 0;

        for ($i = 0; $i < count($list_answer); $i++) {
            $split_answer = str_split($list_answer[$i]);
            $split_answer_user = str_split($list_answer_user[$i]);
            
            $correct = 0;
            $wrong = 0;
            for ($j = 0; $j < count($split_answer); $j++) {
                // Log::info("count : " + count($split_answer));
                if ($split_answer[$j] == $split_answer_user[$j]) {
                    $correct += 1;
                } else {
                    $wrong += 1;
                }
            }
            
            $sum += ($correct * 4) + ($wrong * -1);
            Log::info($sum);
        }

        return $sum / 2;
    }
}
