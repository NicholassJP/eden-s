<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function getPerson()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $checked = request('checked');
            $data = DB::select("SELECT id, name, position, quotes, img, fb_url, tw_url, ig_url FROM `person` where checked like '%" . $checked . "%'");
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

    public function insertPerson()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'name' => 'required',
                'position' => 'required',
                'quotes' => 'required',
                'img' => 'required',
                'fb_url' => 'required',
                'tw_url' => 'required',
                'ig_url' => 'required'
            ]);

            $URL = env('APP_URL');
            $name = request('name');
            $position = request('position');
            $quotes = request('quotes');
            $fb_url = request('fb_url');
            $tw_url = request('tw_url');
            $ig_url = request('ig_url');

            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $location = 'person_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $img_url = $URL . '/' . $location . '/' . $filename;
            };

            DB::insert("insert into person
            (name, position, quotes, img, fb_url, tw_url, ig_url)
            values (?, ?, ?, ?, ?, ?, ?)", [$name, $position, $quotes, $img_url, $fb_url, $tw_url, $ig_url]);

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

    public function updatePerson()
    {
        try {
            $status = true;
            $msg = 'berhasil mengubah data';

            request()->validate([
                'id' => 'required'
            ]);
            $URL = env('APP_URL');
            $id = request('id');
            $allData = request()->all();
            unset($allData['_method']);
            unset($allData['id']);
            $string = '';
            if (request()->hasFile('img')) {
                $file = request()->file('img');
                unset($allData['img']);
                $location = 'person_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $url_file_name = $URL . '/' . $location . '/' .  $filename;
                $string = $string . 'img' . "='" . $url_file_name . "',";
            };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `person` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

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

    public function deletePerson()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from person
            where id = " . $id);

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
                    'message' => 'Terjadi kesalahan' . $e
                ],
            ];
        }
    }
}
