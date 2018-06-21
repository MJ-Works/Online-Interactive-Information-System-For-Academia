<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addDepartment()
    {
        return view('admin.department',compact('error'));
    }

    public function addTag()
    {
        return view('admin.tag',compact('error'));
    }
}