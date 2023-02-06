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
        $jsondetail = json_decode(file_get_contents('https://staging.edenslightconsultant.com/api/v1/getcontact'), true);
        $getcontact = $jsondetail["data"];
   
        return view('contactus', ['title' => 'contactus', 'getcontact' => $getcontact]);
    }
    public function detail_service_product()
    {
        return view('detail_service_product', ['title' => 'detail_service_product']);
    }
    public function detail_news()
    {
        return view('detail_news', ['title' => 'detail_news']);
    }
}
