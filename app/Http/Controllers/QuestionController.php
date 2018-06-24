<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\answer;
use App\tags;
use App\question_tag;
use App\departments;
use App\VoteTable;
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
        $dbvar->departments_id = $request->Department;
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

    public function voteAnswer($id, Request $request)
    {
        $answer = answer::find($id);

        $alreadyVoted = VoteTable::where([
            'answer_id' => $id,
            'user_id' => Auth::user()->id
        ])->get();

        if(!$alreadyVoted->isEmpty()) {
            return redirect()->route('Question', ['id' => $answer->question_id]);
        }

        if($request->submit == "UpVote")
            $answer->UpVote++;
        else $answer->UpVote--;

        $answer->save();

        $dbvar = new VoteTable();
        $dbvar->answer_id = $id;
        $dbvar->user_id = Auth::user()->id;
        $dbvar->save();

        return redirect()->route('Question', ['id' => $answer->question_id]);
    }

    public function voteQuestion($id, Request $request)
    {
        $question = question::find($id);

        $alreadyVoted = VoteTable::where([
            'question_id' => $id,
            'user_id' => Auth::user()->id
        ])->get();

        if(!$alreadyVoted->isEmpty()) {
            return redirect()->route('Question', ['id' => $id]);
        }

        if($request->submit == "UpVote")
            $question->votes++;
        else $question->votes--;

        $question->save();

        $dbvar = new VoteTable();
        $dbvar->question_id = $id;
        $dbvar->user_id = Auth::user()->id;
        $dbvar->save();

        return redirect()->route('Question', ['id' => $id]);
    }

    public function tags()
    {
        $tags = tags::all();
        return view('post.tags',compact('tags'));
    }

    public function questionByTag($id)
    {
        $questions = tags::find($id)->questions;
        $questionId = array();
        foreach($questions as $question)
            array_push($questionId, $question->id);
        
        $allQuestion = question::with('tags','answers','User')->find($questionId);
        
        return view('home',compact('allQuestion'));
    }

    public function departments()
    {
        $tags = departments::all();
        return view('post.departments',compact('tags'));
    }

    public function questionByDepartment($id)
    {
        $questions = departments::find($id)->questions;
    
        $questionId = array();
        foreach($questions as $question)
            array_push($questionId, $question->id);
        
        $allQuestion = question::with('tags','answers','User')->find($questionId);
        
        return view('home',compact('allQuestion'));
    }
}