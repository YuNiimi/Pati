<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Datas;
use \App\Models\Slots;
use \App\Models\Stores;
use Illuminate\Support\Facades\DB;

class MasterSlotController extends Controller
{
    /*public function index(){
        // 店舗データを返す
        $stores = DB::table('stores')->get();
        return view('master.store.index',['datas' => $stores]);
    }*/

    public function edit($store_id){
        $slots = DB::table('slots')->where("store_id",$store_id)->get();
        $store_data = DB::table('stores')->where("id",$store_id)->first();
        $name = $store_data->name;
        return view('master.slot.edit',['datas' => $slots,"store" => $store_id,"name"=>$name]);
    }

    public function slotcreate(Request $request){
        $slot = new Slots;
        $slot->store_id=$request->input('store_id');
        $slot->sis=$request->input('code');
        $slot->name=$request->input('name');
        $slot->name_encode=$request->input('name_encode');
        
        $slot->save();
        return redirect('master/'.$request->input('store_id')."/slot");
    }

    public function slotedit(Request $requests){
        // foreach($requests as $request){
        //     var_dump($request);
        // }
        for($i=0;$i<count($requests["edit_names"]);$i++){
            $id=$requests["store_id"];
            $slots_id=$requests["edit_ids"][$i];
            $sis=$requests["edit_siss"][$i];
            $name=$requests["edit_names"][$i];
            $name_encode=$requests["edit_name_encodes"][$i];
            $slot_detail=0;

            Slots::updateOrCreate(
                ['id' => $slots_id],
                ['sis'=>$sis, 'name'=>$name, 'name_encode'=>$name_encode,'slot_detail'=>$slot_detail]
            );
        }
        return redirect('master/'.$requests->input('store_id')."/slot");
    }

    public function createcorner(Request $request){
        // csvで受け取り
        echo "csvで受け取る";

    }

}
