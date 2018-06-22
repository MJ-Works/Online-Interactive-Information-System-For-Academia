<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use Auth;

class QuestionController extends Controller
{
    public function addQuestion()
    {
        return view('post.AddQuestion',compact('error'));
    }

    public function postQuestion(Request $request)
    {
        $this->validate($request,[
            'Heading' => 'required|string',
            'Question' => 'required|string',
        ]);
        
        $dbvar = new question();
        $dbvar->user_id = Auth::user()->id;
        $dbvar->dept_id = '1';
        $dbvar->Heading = $request->Heading;
        $dbvar->Question = $request->Question;
        $dbvar->PrivateQuestion = $request->PrivateQuestion;
        $dbvar->save();
        return redirect('home');
    }

    public function viewQuestion()
    {
        return view('post.ViewQuestion',compact('error'));
    }
}