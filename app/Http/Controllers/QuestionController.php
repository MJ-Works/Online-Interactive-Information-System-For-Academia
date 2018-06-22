<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\tags;
use App\question_tag;
use App\departments;
use Auth;

class QuestionController extends Controller
{
    public function addQuestion()
    {
        $allTag = tags::all();
        $allDepartment = departments::all();
        return view('post.AddQuestion',compact('error','allTag','allDepartment'));
    }

    public function postQuestion(Request $request)
    {
        $this->validate($request,[
            'Heading' => 'required|string',
            'Question' => 'required|string',
        ]);
        
        $dbvar = new question();
        $dbvar->user_id = Auth::user()->id;
        $dbvar->dept_id = '2';
        $dbvar->Heading = $request->Heading;
        $dbvar->Question = $request->Question;
        $dbvar->PrivateQuestion = $request->PrivateQuestion;
        $dbvar->save();
        
        foreach($request->Tags as $tag)
        {
            $dbvar1 = new question_tag();
            $dbvar1->question_id = $dbvar->id;
            $dbvar1->tag_id = $tag;
            $dbvar1->save();
        }
        

        return redirect('home');
    }

    public function viewQuestion()
    {
        return view('post.ViewQuestion',compact('error'));
    }
}