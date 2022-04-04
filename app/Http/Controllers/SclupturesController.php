<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SclupturesController extends Controller
{
    public function sclupture(){
        $sclupture = DB::table('sculptures')
        ->join('places','places.id','=','sculptures.place_id')
        ->join('place_ids','places.id','=','place_ids.place_id')
        ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
        ->join('languages','languages.id','=','place_ids.lang_id')
        ->select('sculptures.code as code','sculptures.image as image','sculptures.place_id  as place_id',
        'sculpture_ids.name as sculpture_name','sculpture_ids.lang_id as sculpture_lang',
        'sculpture_ids.sculpture_id as sculpture_ids','sculptures.id as sculpture_id'
        ,'languages.language as place_name',
        'place_ids.name as place_name')->get();
        return json_encode($sclupture);
        }
        public function scluptureid($id){
            $sclupture = DB::table('sculptures')->where('sculptures.id',$id)
            ->join('places','places.id','=','sculptures.place_id')
            ->join('place_ids','places.id','=','place_ids.place_id')
            ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
            ->join('languages','languages.id','=','place_ids.lang_id')
            ->select('sculptures.code as code','sculptures.image as image','sculptures.place_id  as place_id',
            'sculpture_ids.name as sculpture_name','sculpture_ids.lang_id as sculpture_lang',
            'sculpture_ids.sculpture_id as sculpture_ids','sculptures.id as sculpture_id'
            ,'languages.language as lang_name',
            'place_ids.name as place_name')->get();
            return json_encode($sclupture);
            }
            public function sclupturelang($lang){
                $sclupture = DB::table('sculptures')
                ->join('places','places.id','=','sculptures.place_id')
                ->join('place_ids','places.id','=','place_ids.place_id')
                ->join('sculpture_ids','sculptures.id','=','sculpture_ids.sculpture_id')
                ->join('languages','languages.id','=','place_ids.lang_id')
                ->where('sculpture_ids.lang_id',$lang)
                ->where('place_ids.lang_id',$lang)
                ->select('sculptures.code as code','sculptures.image as image','sculptures.place_id  as place_id',
                'sculpture_ids.name as sculpture_name','sculpture_ids.lang_id as sculpture_lang',
                'sculpture_ids.sculpture_id as sculpture_ids','sculptures.id as sculpture_id'
                ,'languages.language as lang_name',
                'place_ids.name as place_name')->get();
                return json_encode($sclupture);
                }
}
