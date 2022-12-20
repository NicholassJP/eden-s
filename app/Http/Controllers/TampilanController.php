<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function index()
    {
        return view('index', ['title' => 'index']);
    }
}
