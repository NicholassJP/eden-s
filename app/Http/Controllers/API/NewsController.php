<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getNews()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $checked = request('checked');
            $data = DB::select("SELECT * FROM `news` where checked like '%" . $checked . "%'");
            $array = json_decode(json_encode($data), true);

            return [
                'data' => $array,
                'meta' => [
                    'status' => $status,
                    'message' => $msg
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

    public function getNewsDetail()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            request()->validate([
                'unique' => 'required',
            ]);
            $unique = request('unique');
            $data = json_decode(json_encode(DB::select("SELECT title, long_desc, img, created_at 'published date' FROM `news` where uniquename='" . $unique . "'")[0]), true);
            $data['more_news'] = json_decode(json_encode(DB::select("SELECT title, short_desc, img, uniquename, created_at 'published date' FROM `news` ORDER by created_at DESC LIMIT 4")), true);

            return [
                'data' => $data,
                'meta' => [
                    'status' => $status,
                    'message' => $msg
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

    public function insertNews()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'title' => 'required',
                'long_desc' => 'required',
                'short_desc' => 'required',
                'img' => 'required'
            ]);

            $URL = config('app.url');
            $title = request('title');
            $long_desc = request('long_desc');
            $short_desc = request('short_desc');

            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $location = 'news_img';
                $filename = rand(1, 99) . $file->getClientOriginalName();
                $file->move($location, $filename);
                $img_url = $URL . '/' . $location . '/' . $filename;
            };

            $unique = str_replace(" ", "-", $title);
            $unique = preg_replace('/[^A-Za-z0-9\-]/', '', $unique);
            $unique = $unique . "-" . rand(1, 99);

            DB::insert("insert into news
            (title, long_desc, short_desc, img, uniquename)
            values (?, ?, ?, ?, ?)", [$title, $long_desc, $short_desc, $img_url, $unique]);

            return [
                'data' => [],
                'meta' => [
                    'status' => $status,
                    'message' => $msg
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

    public function updateNews()
    {
        try {
            $status = true;
            $msg = 'berhasil mengubah data';

            request()->validate([
                'id' => 'required'
            ]);
            $URL = config('app.url');
            $id = request('id');
            $allData = request()->all();
            unset($allData['_method']);
            unset($allData['id']);
            $string = '';
            if (request()->hasFile('img')) {
                $file = request()->file('img');
                unset($allData['img']);
                $location = 'service_img';
                $filename = rand(1, 99) . $file->getClientOriginalName();
                $file->move($location, $filename);
                $url_file_name = $URL . '/' . $location . '/' .  $filename;
                $string = $string . 'img' . "='" . $url_file_name . "',";
            };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `news` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

            return [
                'data' => [],
                'meta' => [
                    'status' => $status,
                    'message' => $msg
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

    public function deleteNews()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from news where id = " . $id);

            return [
                'data' => [],
                'meta' => [
                    'status' => $status,
                    'message' => $msg
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
