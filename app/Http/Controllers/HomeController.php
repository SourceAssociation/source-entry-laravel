<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EntrySetting;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
