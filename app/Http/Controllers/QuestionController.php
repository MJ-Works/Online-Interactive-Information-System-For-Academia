<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion()
    {
        return view('post.AddQuestion',compact('error'));
    }
}