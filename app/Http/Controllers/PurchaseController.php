<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Module;
use Alert;

class PurchaseController extends Controller
{
    public function purchase(Request $request) {
        $module = Module::where('id', $request->module_id)->first();

        if ($request->jenis_ticket == NULL) {
            return response()->json(['code' => 400, 'message' => 'Jenis tiket tidak boleh kosong']);
        }

        if ($request->total_ticket == NULL) {
            return response()->json(['code' => 400, 'message' => 'Jumlah kuota tidak boleh kosong']);
        }
        
        $purchase = Purchase::create([
            'user_id'           => \Auth::user()->id,
            'module_id'         => $module->id,
            'ticket_type_id'    => $request->jenis_ticket,
            'price'             => $module->discount_price,
            'total_ticket'      => $request->total_ticket,
            'status'            => 0,
        ]);

        return response()->json(['code' => '200', 'data' => $purchase]);
    }

    public function postAjaxGetModuleName(Request $request) {
        $module = Module::where('id', $request->module_id)->first();

        return response()->json($module);
    }
}
