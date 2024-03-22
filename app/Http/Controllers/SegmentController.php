<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        return view('segment.index');
    }
    public function hometeam()
    {
        return view('segment.hometeam');
    }
    public function guestteam()
    {
        return view('segment.guestteam');
    }
    public function team()
    {
        return view('segment.team');
    }
    public function player()
    {
        return view('segment.player');
    }
}
