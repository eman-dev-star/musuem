<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PlacesController extends Controller
{
    public function places(){
        $places = DB::table('places')
        ->join('place_ids','places.id','=','place_ids.place_id')
        ->join('languages','languages.id','=','place_ids.lang_id')
        ->select('places.id as place_id','place_ids.id as place_ids','place_ids.name as place_name'
        ,'languages.language as lang_name','languages.id as lang_id',
        'places.image as image')->get();
        return json_encode($places);
        }
        public function placescity(){
            $places = DB::table('places')
            ->join('cities','places.city_id','=','cities.id')
            ->join('city_ids','cities.id','=','city_ids.city_id')
            ->join('place_ids','places.id','=','place_ids.place_id')
            ->join('languages','languages.id','=','place_ids.lang_id')
            ->select('places.id as place_id','place_ids.id as place_ids',
            'cities.id as city_id','city_ids.id as city_ids',
            'place_ids.name as place_name','city_ids.name as city_name'
            ,'languages.language as lang_name','places.image as image','languages.id as lang_id')
            ->get();
            return json_encode($places);
            }
            public function placelang($lang){
                $places = DB::table('places')
                ->join('cities','places.city_id','=','cities.id')
                ->join('city_ids','cities.id','=','city_ids.city_id')
                ->join('place_ids','places.id','=','place_ids.place_id')
                ->join('languages','languages.id','=','place_ids.lang_id')
                ->where('place_ids.lang_id',$lang)
                ->where('city_ids.lang_id',$lang)
                ->select('places.id as place_id','place_ids.id as place_ids',
                'cities.id as city_id','city_ids.id as city_ids',
                'place_ids.name as place_name','city_ids.name as city_name'
                ,'languages.language as lang_name','languages.id as lang_id','places.image as image')
                ->get();
                return json_encode($places);
                }
}
