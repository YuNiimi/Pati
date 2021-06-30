<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Datas;
use \App\Models\Slots;
use \App\Models\Stores;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
class DatasController extends Controller
{
    public function index(){
        // 店舗データを返す
        $datas = DB::table('datas')->get();
        return view('datas.index',['datas' => $datas]);
    }

    public function download( Request $request )
    {
        $datas = DB::table('datas')->get();
        $cvsList = array();
        foreach($datas as $data){
            $ar = array();
            foreach($data as $el){
                array_push($ar,$el);
            }
            array_push($cvsList,$ar);
        }
        // dd($cvsList);
        $response = new StreamedResponse (function() use ($request, $cvsList){
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach($cvsList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="sample.csv"');
 
        return $response;
    }

    

}
