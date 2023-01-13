<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
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

            $data = json_decode(json_encode($getData[0]), true);

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

    public function getHome()
    {
        try {
            $data = json_decode(json_encode(DB::select("SELECT * FROM `content_home`")[0]), true);
            $data['expertise'] = json_decode(json_encode(DB::select("SELECT title, img FROM `service` where checked=1")), true);
            $data['activity'] = json_decode(json_encode(DB::select("SELECT title, short_desc, img FROM `news` where checked=1")), true);
            $data['person'] = json_decode(json_encode(DB::select("SELECT name, position, quotes, img, fb_url, tw_url, ig_url FROM `person` where checked=1")), true);
            $data['partner'] = json_decode(json_encode(DB::select("SELECT img FROM `partner`")), true);

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

    public function getServiceAndProduct()
    {
        try {
            $data = json_decode(json_encode(DB::select("SELECT * FROM `content_service_and_product`")[0]), true);
            $data['all_product'] = json_decode(json_encode(DB::select("select title, description, img from product order by title")), true);
            $data['service'] = json_decode(json_encode(DB::select("select id, title, catalogue_check, demo_link_check, catalogue_url from service order by title")), true);
            for ($i = 0; $i < count($data['service']); $i++) {
                $id = $data['service'][$i]['id'];
                $data['service'][$i]['product'] = json_decode(json_encode(DB::select("select title, description, img from product where service_id=" . $id . " order by title")), true);
            }

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

    public function getNews()
    {
        try {
            $data['all_project'] = json_decode(json_encode(DB::select("select title, long_desc, short_desc, img, uniquename from news order by title")), true);
            $data['our_project'] = json_decode(json_encode(DB::select("select id, title from category order by title")), true);
            for ($i = 0; $i < count($data['our_project']); $i++) {
                $id = $data['our_project'][$i]['id'];
                $data['our_project'][$i]['project'] = json_decode(json_encode(DB::select("SELECT n.title, n.long_desc, n.short_desc, n.img, n.uniquename FROM `category_and_news` can join news n on n.id=can.news_id  where category_id='" . $id . "' order by n.title")), true);
            }

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

    public function getContact()
    {
        try {
            $getData = DB::select("SELECT * FROM `content_contact_us`");
            $data['category'] = json_decode(json_encode(DB::select("select id, title from service order by title")), true);
            for ($i = 0; $i < count($data['category']); $i++) {
                $id = $data['category'][$i]['id'];
                $data['category'][$i]['sub_category'] = json_decode(json_encode(DB::select("SELECT title FROM `product` where service_id='" . $id . "' order by title")), true);
            }

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
                    'message' => 'Terjadi kesalahan' . $e
                ],
            ];
        }
    }
}
