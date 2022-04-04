<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Language;
use App\Models\City;
use App\Models\PlaceId;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Exception;

class PlaceController extends Controller
{
    public function index()
    {

        $places = DB::table('places_names')->groupBy('cityid');
        return view('dashbord.places.index', compact('places'));
    }

    public function create()
    {
        $languages = Language::all();
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");
        return view('dashbord.places.create', compact('languages', 'cities'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'city_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'name' => ['required', Rule::unique('city_ids', 'name')]
        ]);
        $place = new Place();
        $place->city_id = $request->city_id;
        $place->image = $request->image->hashName();
        $place->save();
        $id = DB::table('places')->get()->last()->id;
        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/places/' . $request->image->hashName()));
        } //end of if
        PlaceId::create([
            'place_id' => $id,
            'lang_id' => $request->lang_id,
            'name' => $request->name,
        ]);

        session()->flash('success', 'dded_successfuly');
        return redirect()->route('places.index');
    }


    public function show(Place $place)
    {
        $languages = Language::all();
        $places = DB::select("SELECT `name`,`place_id` FROM `place_ids` ");


        return view('dashbord.places.show', compact('languages', 'place','places'));
    }

    public function addlang(Place $place, Request $request)
    {
        // dd($request->all());
        PlaceId::create([
            'place_id' => $request->id,
            'lang_id' => $request->lang_id,
            'name' => $request->name
        ]);
        session()->flash('success', 'name added successfuly');
        return redirect()->route('places.index');
    }
    public function edit(Place $place)
    {
        $languages = Language::all();
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");
        $place = DB::select("select * from  places_names where id = {$place->id} ");
        return view('dashbord.places.edit', compact('languages', 'place', 'cities'));
    }

    public function update(Request $request, Place $place)
    {
        $request_data = $request->validate([
            'city_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'name' => ['required', Rule::unique('city_ids', 'name')->ignore($place->id)]
        ]);


 if ($request->image) {
            if ($place->image !== 'place.jpg') {
                Storage::disk('public_upload')->delete('/places/' . $place->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/places/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
            $place->update([
                'city_id' => $request->city_id,
                'image'=>$request_data['image']
            ]);
        } //end of if
      else{
        $place->update([
            'city_id' => $request->city_id,
         ]);
      }
     if(DB::update("UPDATE `place_ids` SET `name`='$request->name' where place_id='$place->id' and `lang_id`='{$request->lang_id}' ")){

     }else{
        DB::insert("INSERT INTO `place_ids` SET `name`='$request->name',place_id='$place->id',`lang_id`='{$request->lang_id}' ");
      }
        session()->flash('success', 'place updated successfuly');
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        try{
            $place->delete();
            if ($place->image != 'place.jpg') {

                Storage::disk('public_upload')->delete('/places/' . $place->image);
            } //end of if
            session()->flash('success', ('deleted successfully'));
            return redirect()->route('places.index');
            }catch(Exception $e){

                return redirect()->route('places.index')->with('error',"can not delete this place");
            }

    }
    public function getPlaceByLang($lang_id, $place_id)
    {
        $place = DB::select("select place_name,city_name from  places_names where id = '{$place_id}' and lang_id='{$lang_id}'");
        $data = $place ? "

<div id='place_name'>

<input type='text' class='form-control' name='name' value='{$place[0]->place_name}'></div>" :"<div id='place_name'><input type='text' class='form-control' name='name' value=''></div>";
        return json_encode($data);
    }
}
