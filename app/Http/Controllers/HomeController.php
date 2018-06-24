<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\tags;
use App\question_tag;
use App\answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allQuestion = question::with('tags','answers','User')->orderBy('created_at', 'desc')->get();
        // $i=0;
        // foreach($allQuestion as $question)
        // {
        //     if($i>0)
        //     {
        //         foreach($question->tags as $tag)
        //             return $tag->TagName;
        //     }
        //     $i++;
        // }
        //return $allQuestion;
        return view('home',compact('allQuestion'));
    }

    public function addPersonalInfo()
    {
        return view('personal_info');
    }
}
