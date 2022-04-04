<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = DB::select("SELECT * FROM `users` ");


       return view('dashbord.user.index',compact('users'));
    }


    public function create()
    {
        // $languages= $langs = DB::select("SELECT * FROM `languages` ");;

        return view('dashbord.user.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users',
            'image'=>'image',
            'password'=>'required',
            'gender'=>'required'
        ]);
        $request_data=$request->except(['password','image']);
        $request_data['password']=bcrypt($request->password);
        if($request->image){
            Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('uploads/users/'.$request->image->hashName()));
            $request_data['image']=$request->image->hashName();

        }//end of if

        $user=User::create($request_data);

        session()->flash('success',__('user added successfuly'));
        return redirect()->route('users.index');
    }




    public function edit(user $user)
    {
        return view('dashbord.user.edit',compact('user'));

    }


    public function update(Request $request, user $user)
    {
         $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required', Rule::unique('users')->ignore($user->id),],
            'image'=>'image',
            'gender'=>'required'

        ]);
        $request_data=$request->except(['image']);
        if($request->image){
            if($user->image !='one.png'){
             Storage::disk('public_upload')->delete('/users/'.$user->image);
             }
            Image::make($request->image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('uploads/users/'.$request->image->hashName()));
            $request_data['image']=$request->image->hashName();

        }//end of if
        $user->update($request_data);
         session()->flash('success',__('user update successfuly'));
         return redirect()->route('users.index');
    }

    public function destroy(user $user)
    {
        if($user->image !='one.png'){
            Storage::disk('public_upload')->delete('/users/'.$user->image);

        }//end if
        $user->delete();
         session()->flash('success',__('user delete successfuly'));
         return redirect()->route('users.index');
    }
}
