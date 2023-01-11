<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralContentController extends Controller
{
    //content
    public function getContent()
    {
        try {
            request()->validate([
                'tipe' => 'required'
            ]);
            $tipe = request('tipe');
            if ($tipe == 'nav') {
                $getData = DB::select("SELECT * FROM `content_nav`");
            } else if ($tipe == 'home') {
                $getData = DB::select("SELECT * FROM `content_home`");
            } else if ($tipe == 'service') {
                $getData = DB::select("SELECT * FROM `content_service_and_product`");
            } else if ($tipe == 'contact') {
                $getData = DB::select("SELECT * FROM `content_contact_us`");
            }

            $data = json_decode(json_encode($getData), true);

            return [
                'data' => $data,
                'meta' => [
                    'status' => true,
                    'message' => 'berhasil mengambil data'
                ],
            ];
        } catch (\Exception $e) {
            return [
                'data' => [],
                'meta' => [
                    'status' => false,
                    'message' => 'Terjadi kesalahan'
                ],
            ];
        }
    }

    public function updateContent(Request $request)
    {
        try {
            request()->validate([
                'tipe' => 'required'
            ]);
            $URL = config('app.url');
            $tipe = request('tipe');
            $allData = $request->all();
            unset($allData['_method']);
            unset($allData['tipe']);

            if ($tipe == 'nav') {
                $string = '';
                if ($request->hasFile('logo_img')) {
                    $file = $request->file('logo_img');
                    unset($allData['logo_img']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'logo_img' . "='" . $url_file_name . "',";
                };
                if ($request->hasFile('image1')) {
                    $file = $request->file('image1');
                    unset($allData['image1']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'image1' . "='" . $url_file_name . "',";
                };
                if ($request->hasFile('image2')) {
                    $file = $request->file('image2');
                    unset($allData['image2']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'image2' . "='" . $url_file_name . "',";
                };
                if ($request->hasFile('image3')) {
                    $file = $request->file('image3');
                    unset($allData['image3']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'image3' . "='" . $url_file_name . "',";
                };
                if ($request->hasFile('image4')) {
                    $file = $request->file('image4');
                    unset($allData['image4']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'image4' . "='" . $url_file_name . "',";
                };
                foreach ($allData as $key => $value) {
                    $string = $string . $key . "='" . $value . "',";
                }
                $string = substr_replace($string, "", -1);
                DB::select("UPDATE `content_nav` set " . $string);
            } else if ($tipe == 'home') {
                $string = '';
                if ($request->hasFile('section2_logo')) {
                    $file = $request->file('section2_logo');
                    unset($allData['section2_logo']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'section2_logo' . "='" . $url_file_name . "',";
                };
                foreach ($allData as $key => $value) {
                    $string = $string . $key . "='" . $value . "',";
                }
                $string = substr_replace($string, "", -1);
                DB::select("UPDATE `content_home` set " . $string);
            } else if ($tipe == 'service') {
                $string = '';
                if ($request->hasFile('flow_img')) {
                    $file = $request->file('flow_img');
                    unset($allData['flow_img']);
                    $location = 'img';
                    $filename = $file->getClientOriginalName();
                    $file->move($location, $filename);
                    $url_file_name = $URL . '/' . $location . '/' .  $filename;
                    $string = $string . 'flow_img' . "='" . $url_file_name . "',";
                };
                foreach ($allData as $key => $value) {
                    $string = $string . $key . "='" . $value . "',";
                }
                $string = substr_replace($string, "", -1);
                DB::select("UPDATE `content_service_and_product` set " . $string);
            } else if ($tipe == 'contact') {
                $string = '';
                foreach ($allData as $key => $value) {
                    $string = $string . $key . "='" . $value . "',";
                }
                $string = substr_replace($string, "", -1);
                DB::select("UPDATE `content_contact_us` set " . $string);
            }

            return [
                'data' => [],
                'meta' => [
                    'status' => true,
                    'message' => 'berhasil mengubah data'
                ],
            ];
        } catch (\Exception $e) {
            return [
                'data' => [],
                'meta' => [
                    'status' => false,
                    'message' => 'Terjadi kesalahan'
                ],
            ];
        }
    }
}
