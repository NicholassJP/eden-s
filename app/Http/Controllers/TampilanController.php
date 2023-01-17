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
    public function service_product()
    {
        return view('service_product', ['title' => 'service_product']);
    }
    public function news()
    {
        return view('news', ['title' => 'news']);
    }
    public function contactus()
    {
        return view('contactus', ['title' => 'contactus']);
    }
    public function detail_service_product()
    {
        return view('detail_service_product', ['title' => 'detail_service_product']);
    }
}
