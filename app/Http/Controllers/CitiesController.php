<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function cities(){
        $citie = DB::table('cities')
        ->join('city_ids','cities.id','=','city_ids.city_id')
        ->select('cities.id as city_id','city_ids.city_id as city_ids','city_ids.name as city_name')->get();
        return json_encode($citie);
        }
        public function city($id){
            $cities = DB::table('cities')->where('cities.id',$id)
            ->join('city_ids','cities.id','=','city_ids.city_id')
            ->select('cities.id as city_id','city_ids.city_id as city_ids','city_ids.name as city_name',
            )->get();
            return json_encode($cities);
            }
            public function citylang($lang){
                $cities = DB::table('cities')
                ->join('city_ids','cities.id','=','city_ids.city_id')
                ->join('languages','languages.id','=','city_ids.lang_id')
                ->where('city_ids.lang_id',$lang)
                ->select('cities.id as city_id','city_ids.city_id as city_ids','city_ids.name as city_name',
                'languages.language as lang_name','languages.id as lang_id')
                ->get();
                return json_encode($cities);
                }
}
