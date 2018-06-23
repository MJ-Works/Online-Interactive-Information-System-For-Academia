<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
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
        $dbvar->Votes = 0;
        $dbvar->PrivateQuestion = $request->PrivateQuestion;
        $dbvar->save();
        
        foreach($request->Tags as $tag)
        {
            $dbvar1 = new question_tag();
            $dbvar1->question_id = $dbvar->id;
            $dbvar1->tags_id = $tag;
            $dbvar1->save();
        }
        

        return redirect('home');
    }

    public function viewQuestion($id)
    {
       $question = question::with('tags','answers','User')->find($id);
       //return $question;
        return view('post.ViewQuestion',compact('error','question'));
    }

    public function postAnswer($id, Request $request)
    {
        $dbvar = new answer();
        $dbvar->user_id = Auth::user()->id;
        $dbvar->question_id = $id;
        $dbvar->Answer = $request->Answer;
        $dbvar->UpVote = 0;
        $dbvar->DownVote = 0;
        $dbvar->save();
        return redirect()->route('Question', ['id' => $id]);
    }
}