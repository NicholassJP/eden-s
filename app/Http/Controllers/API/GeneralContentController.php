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
                $getData = DB::select("SELECT * FROM `nav_content`");
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
                    $url_file_name = $URL . $location . '/' .  $filename;
                    $string = $string . 'logo_img' . "='" . $url_file_name . "',";
                };
                foreach ($allData as $key => $value) {
                    $string = $string . $key . "='" . $value . "',";
                }
                $string = substr_replace($string, "", -1);
                DB::select("UPDATE `nav_content` set " . $string);
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
                    'message' => 'Terjadi kesalahan' . $e
                ],
            ];
        }
    }
}