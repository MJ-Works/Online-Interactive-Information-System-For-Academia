<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departments;
use App\tags;

class AdminController extends Controller
{
    public function addDepartment()
    {
        $allDepartment = departments::all();
        //return $allDepartment;
        return view('admin.department',compact('error','allDepartment'));
    }

    public function postDepartment(Request $request)
    {
        $this->validate($request,[
            'DepartmentName' => 'required|string',
        ]);
        
        $dbvar = new departments();
        $dbvar->DepartmentName = $request->DepartmentName;
        $dbvar->save();
        return redirect('addDepartment');
    }

    public function deleteDepartment(Request $request)
    {
        $deparment = departments::find($request->submit);
        $deparment->delete();

       return redirect('addDepartment');
    }

    public function addTag()
    {
        $allTag = tags::all();
        return view('admin.tag',compact('error','allTag'));
    }
    
    public function postTag(Request $request)
    {
        $this->validate($request,[
            'TagName' => 'required|string',
        ]);
        
        $dbvar = new tags();
        $dbvar->TagName = $request->TagName;
        $dbvar->save();
        return redirect('addTag');
    }

    public function deleteTag(Request $request)
    {
        $tag = tags::find($request->submit);
        $tag->delete();
        
       return redirect('addTag');
    }
}