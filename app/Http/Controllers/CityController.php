<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityId;

use Illuminate\Http\Request;
use App\Models\Language;
use Exception;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    public function index(Request $request)
     {

        $cities = DB::select("select * from  cities_names WHERE  lang_id=4");

        return view('dashbord.cities.index',compact('cities'));
    }

    public function create()
    {
        $languages=Language::all();
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");

        return view('dashbord.cities.create',compact('languages','cities'));


    }


    public function store(Request $request)
    {

        $data=$request->validate([

            'name'=>'required|unique:sculpture_ids',
            'lang_id'=>'required'
        ]);
        $city=new City();
        $city->save();
        $id=City::latest()->first()->id;
        CityId::create([
            'name'=>$request->name,
            'lang_id'=>$request->lang_id,
            'city_id'=>$id,
        ]);

        // }


        session()->flash('success','added successfuly');
        return redirect()->route('cities.index');

    }


    public function show(City $city)
    {
        $languages=Language::all();
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");

        return view('dashbord.cities.show',compact('languages','city','cities'));

    }
    public function addlang(City $city,Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            'city_id'=>'required',
            'name'=>'required|unique:sculpture_ids,name',
            'lang_id'=>'required'
        ]);
        CityId::create([
            'city_id'=>$request->city_id,
            'lang_id'=>$request->lang_id,
            'name'=>$request->name
        ]);
        session()->flash('success','name added successfuly');
        return redirect()->route('cities.index');

    }
    public function edit(City $city)
    {
        $languages=Language::all();
        $city = DB::select("select * from  cities_names where id = {$city->id}");
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");

        return view('dashbord.cities.edit',compact('city','languages','cities'));
    }

    public function update(Request $request, City $city)
    {
          try{
            DB::update("update city_ids set name='{$request->name}' where city_id = '$request->city_id' and lang_id='$request->lang_id'");

          }catch(Exception $e){
            DB::insert("INSERT INTO city_ids set name='{$request->name}' , city_id = '$request->city_id' , lang_id='$request->lang_id'");

          }

        session()->flash('success', ('updated successfully'));
        return redirect()->route('cities.index');
    }


    public function destroy(City $city)
    {
        try{
        $city->forceDelete();
        session()->flash('success', ('deleted successfully'));
        return redirect()->route('cities.index');
        }catch(Exception $e){

            return redirect()->route('cities.index')->with('error',"can not delete this city");
        }
    }
    public function getCityByLang($lang_id,$city_id)
    {

        $city = DB::select("select city_name from  cities_names where id = '{$city_id}' and lang_id='{$lang_id}'");
        $data['city'] =$city? "<input type='text' class='form-control' name='name' id='city_name' value='{$city[0]->city_name}'>":"<input type='text' class='form-control' name='name' id='city_name' value=''>";
        return json_encode($data);
    }
}
