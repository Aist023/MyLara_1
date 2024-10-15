<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexGet(){

        return view('Home/index');
    }

    public function indexPost(Request $request){
        $data = $request->all();
        switch ($data['Ex_1_button']) {
            case 'Open_News':{return redirect('news');}break;
            case 'Open_Questions':{return redirect('questions');}break;
        }
        return view('Home/index');
    }
}
