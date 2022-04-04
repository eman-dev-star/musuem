<?php
namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{

    public function index(Request $request)
    {
        $languages= $langs = DB::select("SELECT * FROM `languages` ");;
        return view('dashbord.languages.index',compact('languages'));
    }


    public function create()
    {

        return view('dashbord.languages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        Language::create($request->all());
        session()->flash('success','added_successfuly');
        return redirect()->route('languages.index');
    }
    public function show(Language $language)
    {
        //
    }

    public function edit(Language $language)
    {
        return view('dashbord.languages.edit',compact('language'));

    }

    public function update(Request $request,Language  $language)
    {
        $data=$request->validate([
            "language"=>'required|max:255',
            'code'=>Rule::unique('languages')->ignore($language->id),
        ]);
        $language->update($data);
        session()->flash('success','updated successfuly');
        return redirect()->route('languages.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language->delete();
        session()->flash('success','deleted successfuly');
        return redirect()->route('languages.index');
    }
}
