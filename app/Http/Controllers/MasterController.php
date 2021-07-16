<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Datas;
use \App\Models\Slots;
use \App\Models\Stores;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    // debug用処理（./debug）
    public function debug(){
        echo "slots全削除";
        DB::table('slots')->delete();


    }


    public function index(){
        // 店舗データを返す
        $stores = DB::table('stores')->get();
        $slots = DB::table('slots')->get();
        $slot_details = DB::table('slot_details')->get();
        return view('master.master',['stores' => $stores,'slots'=>$slots,'slot_details'=>$slot_details]);
    }

    public function storecreate(Request $request){
        $store = new Stores;
        $store->name = $request->name;
        $store->code = $request->code;
        $store->save();

        $stores = DB::table('stores')->get();
        $slots = DB::table('slots')->get();
        $slot_details = DB::table('slot_details')->get();
        return view('master.master',['stores' => $stores,'slots'=>$slots,'slot_details'=>$slot_details]);
    }

    public function storeedit(Request $request){

        for($i=0;$i<count($request["edit_store_ids"]);$i++){
            $id = $request["edit_store_ids"][$i];
            $name = $request["edit_names"][$i];
            $code = $request["edit_store_codes"][$i];

            Stores::updateOrCreate(
                ['id'=> $id],
                ['name'=>$name, 'code'=>$code]
            );
        }


        $stores = DB::table('stores')->get();
        $slots = DB::table('slots')->get();
        $slot_details = DB::table('slot_details')->get();
        return view('master.master',['stores' => $stores,'slots'=>$slots,'slot_details'=>$slot_details]);
    }


}
