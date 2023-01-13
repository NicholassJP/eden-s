<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function getService()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $checked = request('checked');
            $data = DB::select("SELECT * FROM `service` where checked like '%" . $checked . "%'");
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

    public function insertService()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'title' => 'required',
                'description' => 'required',
                'img' => 'required'
            ]);

            $URL = config('app.url');
            $title = request('title');
            $description = request('description');

            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $location = 'service_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $img_url = $URL . '/' . $location . '/' . $filename;
            };

            DB::insert("insert into service
            (title, description, img)
            values (?, ?, ?)", [$title, $description, $img_url]);

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

    public function updateService()
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
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $url_file_name = $URL . '/' . $location . '/' .  $filename;
                $string = $string . 'img' . "='" . $url_file_name . "',";
            };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `service` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

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

    public function deleteService()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from service where id = " . $id);

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
