<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkController extends Controller
{
    private $mark;

    public function __construct(Mark $mark)
    {
        $this->mark = $mark;
    }

    public function index(){

        return view('marks.home');
    }
}
