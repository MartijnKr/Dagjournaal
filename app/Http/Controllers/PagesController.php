<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;
use DB;

class PagesController extends Controller
{
    public function index() {
        return view('index');
    }

    public function aanwezigenIndex() {
        return view('dag/aanwezigenIndex');
    }

}
