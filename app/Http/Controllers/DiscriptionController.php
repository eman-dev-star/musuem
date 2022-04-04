<?php

namespace App\Http\Controllers;

use App\Models\Discription;
use App\Models\DiscriptionId;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Exception;

class DiscriptionController extends Controller
{

    public function index()
    {
        $discrptions = DB::select("select * from  discrption_sclupture WHERE  lang_id=4");
        return view('dashbord.discptions.index', compact('discrptions'));
    }

    public function create()
    {
        $languages = Language::all();
        $sculptures = DB::select("SELECT `name`,`sculpture_id` FROM `sculpture_ids` ");
        return view('dashbord.discptions.create', compact('languages', 'sculptures'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'sculpture_id' => 'required',
            'audio' => 'mimes:ogg,mpeg,mp3',
            'video' => 'mimes:mp4,ogg,webm',
            'text' => ['required', Rule::unique('discription_ids', 'text')]
        ]);
        $discription = new Discription();
        $discription->sculpture_id = $request->sculpture_id;
        $discription->save();
        $id = DB::table('discriptions')->get()->last()->id;
        if ($request->audio) {
            $audio=$request->audio;
            $name=Carbon::now()->toDateString();
            $nameAudio=$name." _ ".uniqid().".".$audio->getClientOriginalExtension();
            $audio->move('uploads/audio', $nameAudio);
        }
        if ($request->video) {
            $video = $request->video;
            $name = Carbon::now()->toDateString();
            $nameVideo = $name . " _ " . uniqid() . "." . $video->getClientOriginalExtension();
            $video->move('uploads/video', $nameVideo);
        } //end of if
        DiscriptionId::create([
            'discription_id' => $id,
            'lang_id' => $request->lang_id,
            'text' => $request->text,
            'audio' => $nameAudio,
            'video' => $nameVideo,

        ]);

        session()->flash('success', 'added successfuly');
        return redirect()->route('discriptions.index');
    }


    public function show(Discription $discription)
    {
        $languages = Language::all();
        $discriptions = DB::select("SELECT `text`,`discription_id` FROM `discription_ids`");
        // $discrption = DB::select("select * from  discrption_sclupture where discrption_id = {$discription->id} ");


        return view('dashbord.discptions.show', compact('languages', 'discription', 'discriptions'));
    }

    public function addlang(Discription $discription, Request $request)
    {

        DiscriptionId::create([
            'discription_id' => $request->id,
            'lang_id' => $request->lang_id,
            'text' => $request->text,
            'audio' => $request->audio,
            'video' => $request->video,

        ]);
        session()->flash('success', 'Discription added successfuly');
        return redirect()->route('discriptions.index');
    }


    public function edit(Discription $discription)
    {
        $languages = Language::all();
        $sculptures = DB::select("SELECT `name`,`sculpture_id` FROM `sculpture_ids` ");
        // dd($cities);
        $discrption = DB::select("select * from  discrption_sclupture where discrption_id = {$discription->id} ");

        return view('dashbord.discptions.edit', compact('languages', 'sculptures', 'discrption'));
    }


    public function update(Request $request, Discription $discription)
    {

        $data = $request->validate([
            'sculpture_id' => 'required',
            'audio' => 'mimes:ogg,mpeg,mp3',
            'video' => 'mimes:mp4,ogg,webm',
            'text' => ['required', Rule::unique('discription_ids', 'text')->ignore($discription->id)]
        ]);
        if ($request->audio && $request->video) {
            if ($request->audio) {

                $audio = $request->audio;
                $name = Carbon::now()->toDateString();
                $audioname = $name . " _ " . uniqid() . "." . $audio->getClientOriginalExtension();
                $audio->move('uploads/audio/', $audioname);
            } //end of if
            if ($request->video) {
                $video = $request->video;
                $name = Carbon::now()->toDateString();
                $videoname = $name . " _ " . uniqid() . "." . $video->getClientOriginalExtension();
                $video->move('uploads/video/', $videoname);
                // $name=Carbon::now()->toDateString();
                // $imagename='video'." _ ".uniqid().".".$video->getClientOriginalExtension()
            } //end of if
            DB::update("INSERT INTO `discription_ids` SET
    `text`='$request->text',`audio`='$audioname',
    `video`='$videoname' , discription_id ='$discription->id' , `lang_id`='{$request->lang_id}' ");
        } //end of if
        else {
            DB::update("UPDATE `discription_ids` SET
        `text`='$request->text' where discription_id ='$discription->id' and `lang_id`='{$request->lang_id}' ");
        }

        session()->flash('success', 'discription updated successfuly');
        return redirect()->route('discriptions.index');
    }
    public function destroy(Discription $discription)
    {

        try {
            $discription->delete();
            if (is_file('uploads/audio/' . $discription->audio)) {
                unlink('uploads/audio/' . $discription->audio);
            }
            if (is_file('uploads/video/' . $discription->video)) {
                unlink('uploads/video/' . $discription->video);
            }
            session()->flash('warning', 'discription delete successfuly');
            return redirect()->route('discriptions.index');
        } catch (Exception $e) {

            return redirect()->route('discriptions.index')->with('error', "can not delete this discrption");
        }
    }
    public function getDiscrptionByLang($lang_id, $discrption_id)
    {
        $discrption = DB::select("select discrption_name,discrption_audio,discrption_video from  discrption_sclupture where discrption_id = '{$discrption_id}' and lang_id='{$lang_id}'");


if(isset($discrption[0])){
    $videoSrc=asset('/uploads/video/'.$discrption[0]->discrption_video);
    $AudioSrc=asset('/uploads/audio/'.$discrption[0]->discrption_audio);

    $data['name'] = $discrption[0]->discrption_name ? "
    <input type='text' class='form-control' name='text'id='discrption_name' value='{$discrption[0]->discrption_name}'></div>"
    :
    "<div id='place_name'><input type='text' class='form-control' name='text' id='discrption_name' value=''></div>";
         $data['video'] = $discrption[0]->discrption_video ? "
         <div id='video'>
                        <video width='320' height='240' controls>
                            <source src='{$videoSrc}'>
                         </video>
                        </div>" :
         "<div class='form-group'>
         <label>video</label>

             <input type='file' class='form-control image' name='video'>

       </div>";
       $data['audio'] = $discrption[0]->discrption_audio ? "
       <div id='audio'>
                      <audio width='320' height='240' controls>
                          <source src='{$AudioSrc}'>
                       </audio>
                      </div>" :
       "<div class='form-group'>
       <label>audio</label>

           <input type='file' class='form-control image' name='audio'>

     </div>";
}else{
    $data['name'] ="<div id='place_name'><input type='text' class='form-control' name='text' id='discrption_name' value=''></div>";
         $data['video'] =
         "<div class='form-group'>


             <input type='file' class='form-control image' name='video'>

       </div>";
       $data['audio'] =  "
       <div id='audio'>

           <input type='file' class='form-control image' name='audio'>
     </div>
     ";
}
        return json_encode($data);
    }
}
