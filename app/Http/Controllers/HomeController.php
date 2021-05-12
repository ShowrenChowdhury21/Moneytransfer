<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrontendImage;
use App\Models\User;

class HomeController extends Controller
{
    //Index page function
    function index() {
        $sliders = FrontendImage::where('viewpagename','=','home')->where('pagesectionname','=','slider')->get();
        $clients = FrontendImage::where('viewpagename','=','home')->where('pagesectionname','=','client')->get();
        return view('Home.index')->with('sliders', $sliders)
                                ->with('clients',$clients);
    }

    //Transaction(send/recieve) page function
    function transaction(){
        return view('Home.transaction');
    }

    //About us page function
    function aboutus(){
        $users = User::where('type','=','user')->count();
        $aboutpics = FrontendImage::where('viewpagename','=','aboutus')->where('pagesectionname','=','videobg')->select('image')->first();
        return view('Home.aboutus')->with('users', $users)
                                     ->with('aboutpics',$aboutpics);
    }

    //Contact page function
    function contact(){
        return view('Home.contact');
    }

    //Fees page function
    function fees(){
        return view('Home.fees');
    }

    //Help page function
    function help(){
        return view('Home.help');
    }
}
