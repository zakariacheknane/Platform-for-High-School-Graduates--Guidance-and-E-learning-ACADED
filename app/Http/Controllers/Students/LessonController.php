<?php

namespace App\Http\Controllers\Students;
use Illuminate\Http\Request;
use App\Models\post_cours;

use App\Http\Controllers\Controller;

class LessonController extends Controller
{

    public function index()
    {
        return view('student.lessons.index');
    }

}