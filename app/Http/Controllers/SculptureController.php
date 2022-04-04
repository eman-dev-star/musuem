<?php

namespace App\Http\Controllers;
use App\Models\Place;
use App\Models\Language;
use App\Models\City;
use App\Models\Sculpture;
use App\Models\SculptureId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Exception;
class SculptureController extends Controller
{
    public function index()
    {
        $sculptures = DB::select("select * from  sculpures_places WHERE  lang_id=4 ");

        return view('dashbord.scluptures.index',compact('sculptures'));
    }


    public function create()
    {
        $languages=Language::all();
        $places=Place::all();
        $places = DB::select("SELECT `name`,`place_id` FROM `place_ids` ");


        return view('dashbord.scluptures.create',compact('languages','places'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'place_id'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg',
            'lang_id'=>'required',
            'name'=>['required', Rule::unique('sculpture_ids', 'name')],
            'code'=>[Rule::unique('sculptures', 'code')]

        ]);
        $sculpture=new Sculpture();
        $sculpture->place_id=$request->place_id;
        $sculpture->code=$request->code;
        $sculpture->image=$request->image->hashName();
        $sculpture->save();

       $id=DB::table('sculptures')->get()->last()->id;


        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('uploads/sculpture/'.$request->image->hashName()));

        }//end of if
        SculptureId::create([
            'sculpture_id'=>$id,
            'lang_id'=>$request->lang_id,
            'name'=>$request->name,
        ]);


        session()->flash('success','dded_successfuly');
        return redirect()->route('sculptures.index');
    }

    public function show(Sculpture $sculpture)
    {
        $languages=Language::all();
        $sculptures = DB::select("SELECT `name`,`sculpture_id` FROM `sculpture_ids` ");


        return view('dashbord.scluptures.show',compact('languages','sculpture','sculptures'));
    }

    public function addlang(Sculpture $sculpture,Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sculpture_id'=>'required',
            'lang_id'=>'required',
            'name'=>['required', Rule::unique('sculpture_ids', 'name')],
        ]);
        SculptureId::create([
            'sculpture_id'=>$request->id,
            'lang_id'=>$request->lang_id,
            'name'=>$request->name,
        ]);
        session()->flash('success','name added successfuly');
        return redirect()->route('scluptures.index');

    }
    public function edit(Sculpture $sculpture)
    {
        $sculpture = DB::select("select * from  sculpures_places where sculpture_id = {$sculpture->id}");
        $languages=Language::all();
        $cities = DB::select("SELECT `name`,`city_id` FROM `city_ids` ");
        $places = DB::select("SELECT `name`,`place_id` FROM `place_ids` ");

        return view('dashbord.scluptures.edit',compact('sculpture','languages','cities','places'));

    }
    public function update(Request $request, Sculpture $sculpture)
    {
        $request_data=$request->validate([
            'sculpture_id'=>'required',
            'lang_id'=>'required',
            'name'=>['required', Rule::unique('sculpture_ids', 'name')->ignore($sculpture->id)],
        ]);


 if ($request->image) {
            if ($sculpture->image !== 'sculpture.jpg') {
                Storage::disk('public_upload')->delete('/sculpture/'. $sculpture->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/sculpture/' . $request->image->hashName()));
            $request_data['image'] = $request->image->hashName();
            $sculpture->update([
                'place_id' => $request->place_id,
                'code' => $request->code,
                'image'=>$request_data['image']
            ]);
        } //end of if
      else{
        $sculpture->update([
            'place_id' => $request->place_id,
            'code' => $request->code,

        ]);
      }

       if(DB::update("UPDATE `sculpture_ids` SET `name`='$request->name' where sculpture_id='$sculpture->id' and `lang_id`='{$request->lang_id}' ")) {

       }else{
        DB::insert("INSERT INTO sculpture_ids SET name='$request->name',sculpture_id='$sculpture->id',lang_id='{$request->lang_id}' ");
      }
        session()->flash('success', 'updated successfuly');
        return redirect()->route('sculptures.index');
    }

    public function destroy(Sculpture $sculpture)
    {
        try{
            $sculpture->delete();
            if ($sculpture->image != 'place.jpg') {
                Storage::disk('public_upload')->delete('/sculpture/' . $sculpture->image);
            }
            session()->flash('success', ('deleted successfully'));
            return redirect()->route('sculptures.index');
            }catch(Exception $e){

                return redirect()->route('sculptures.index')->with('error',"can not delete this city");
            }
        }


    public function getSculptureByLang($lang_id,$sculpture_id)
    {
        $sculpture = DB::select("select sculpture_name from  sculpures_places where sculpture_id = '{$sculpture_id}' and lang_id='{$lang_id}'");
        $data =$sculpture? "<input type='text' class='form-control' name='name' id='name' value='{$sculpture[0]->sculpture_name}'>":"<input type='text' class='form-control' name='name' id='name' value=''>";
        return json_encode($data);
    }
}
