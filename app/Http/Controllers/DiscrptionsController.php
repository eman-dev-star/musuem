<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscrptionsController extends Controller
{
    public function discrption(){
        $discrption = DB::table('discriptions')
        ->join('sculptures','sculptures.id','=','discriptions.sculpture_id')
        ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
        ->join('discription_ids','discriptions.id','=','discription_ids.discription_id')
        ->join('languages','languages.id','=','discription_ids.lang_id')
        ->select('discriptions.id as discriptions_id','discription_ids.discription_id as discription_ids',
        'sculptures.id as sculpture_id','sculpture_ids.sculpture_id as sculpture_ids',
        'discription_ids.text as text',
        'discription_ids.audio as audio'
        ,'discription_ids.video as video',
        'discriptions.sculpture_id as sculptures_id',
        'sculpture_ids.name as sclupture_name'
        ,'languages.language as lang_name',
        'languages.id as lang_id'
        )->get();
        return json_encode($discrption);
        }
        public function discrptionid($id){
            $discrption = DB::table('discriptions')->where('discriptions.id',$id)
            ->join('sculptures','sculptures.id','=','discriptions.sculpture_id')
            ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
            ->join('discription_ids','discriptions.id','=','discription_ids.discription_id')
            ->join('languages','languages.id','=','discription_ids.lang_id')
            ->select('discriptions.id as discriptions_id','discription_ids.discription_id as discription_ids',
            'sculptures.id as sculpture_id','sculpture_ids.sculpture_id as sculpture_ids','discription_ids.text as text','discriptions.sculpture_id as sculptures_id',
            'discription_ids.audio as audio','discription_ids.video as video',
            'sculpture_ids.name as sclupture_name'
            ,'languages.language as lang_name',
            'languages.id as lang_id'
            )->get();
            return json_encode($discrption);
            }
        public function discrptionlang($lang){
            $discrption = DB::table('discriptions')
            ->join('sculptures','sculptures.id','=','discriptions.sculpture_id')
            ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
            ->join('discription_ids','discriptions.id','=','discription_ids.discription_id')
            ->join('languages','languages.id','=','discription_ids.lang_id')
            ->where('discription_ids.lang_id',$lang)
            ->where('sculpture_ids.lang_id',$lang)
            ->select('discriptions.id as discriptions_id','discription_ids.discription_id as discription_ids',
            'sculptures.id as sculpture_id','sculpture_ids.sculpture_id as sculpture_ids','discription_ids.text as text',
            'discription_ids.audio as audio','discription_ids.video as video',
            'sculpture_ids.name as sclupture_name'
            ,'languages.language as lang_name',
            'languages.id as lang_id'
            )->get();
            return json_encode($discrption);
            }
}
