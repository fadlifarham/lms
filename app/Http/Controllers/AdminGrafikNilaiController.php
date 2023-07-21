<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
use App\Company;
use App\CompanyUser;
use Log;

class AdminGrafikNilaiController extends Controller
{
    public function getAdminGrafikNilai() {
        $kelas = Company::all();

        return view('admin/grafik-nilai', [
            'kelas' => $kelas,
        ]);
    }

    public function showGrafik() {
        return view('admin/show-grafik');
    }

    public function getCurrentAdminGrafikNilai($id_jenis, $id_kelas) {
        $list_nilai = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        if ($id_jenis == 1) {
            $users = CompanyUser::where('company_id', $id_kelas)
                ->with('ticket.score')
                ->whereHas('ticket.score', function($query) {
                    $query->where('type', 0);
                    $query->orderBy('created_at', 'desc');
                })
                ->get();
        } else if ($id_jenis == 2) {
            $users = CompanyUser::where('company_id', $id_kelas)
                ->with('ticket.score')
                ->whereHas('ticket.score', function($query) {
                    $query->where('type', 1);
                    $query->orderBy('created_at', 'desc');
                })
                ->get();
        } else {
            $users = CompanyUser::where('company_id', $id_kelas)
                ->with('ticket.hot_score')
                ->get();
        }

        if ($id_jenis == 3) {
            foreach($users as $item) {

                if ($item->hot_score == NULL) {
                    continue;
                }

                $jenis = $item->ticket->hot_score->first();
    
                $nilai_user = $jenis->total;
    
                $start = 0;
                for ($i = 0; $i < 10; $i++) {
                    if ($start == 0) {
                        if (($start <= $nilai_user) && ($nilai_user <= $start + 10)) {
                            $list_nilai[$i] = $list_nilai[$i] + 1;
                            break;
                        }
                    } else {
                        if (($start + 1 <= $nilai_user) && ($nilai_user <= $start + 10)) {
                            $list_nilai[$i] = $list_nilai[$i] + 1;
                            break;
                        }
                    }
                    
    
                    $start += 10;
                }
            }
        } else {
            foreach($users as $item) {

                if ($item->score == NULL) {
                    continue;
                }

                $jenis = $item->ticket->score->first();
    
                $nilai_user = HelperController::scoring(
                    $jenis->correct,
                    $jenis->wrong,
                    $jenis->not_answered
                );
    
                $start = 0;
                for ($i = 0; $i < 10; $i++) {
                    if ($start == 0) {
                        if (($start <= $nilai_user) && ($nilai_user <= $start + 10)) {
                            $list_nilai[$i] = $list_nilai[$i] + 1;
                            break;
                        }
                    } else {
                        if (($start + 1 <= $nilai_user) && ($nilai_user <= $start + 10)) {
                            $list_nilai[$i] = $list_nilai[$i] + 1;
                            break;
                        }
                    }
    
                    $start += 10;
                }
            }
        }

        

        return view('admin/current-grafik-nilai', [
            'users'     => $users,
            'list_nilai'   => $list_nilai
        ]);
    }
}
