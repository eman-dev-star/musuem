<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LangController extends Controller
{
    public function langs(){
        $langs = DB::select("SELECT `id`,`language` FROM `languages` ");
        return json_encode($langs);
        }
}
