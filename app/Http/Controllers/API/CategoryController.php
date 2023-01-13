<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategory()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $data = DB::select("SELECT * FROM `category`");
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

    public function insertCategory()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'title' => 'required'
            ]);

            // $URL = config('app.url');
            $title = request('title');

            // if (request()->hasFile('img')) {
            //     $file = request()->file('img');
            //     $location = 'category_img';
            //     $filename = $file->getClientOriginalName();
            //     $file->move($location, $filename);
            //     $img_url = $URL . '/' . $location . '/' . $filename;
            // };

            DB::insert("insert into category
            (title)
            values (?)", [$title]);

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

    public function updateCategory()
    {
        try {
            $status = true;
            $msg = 'berhasil mengubah data';

            request()->validate([
                'id' => 'required',
                // 'img'=> 'required'
            ]);
            // $URL = config('app.url');
            $id = request('id');
            $allData = request()->all();
            unset($allData['_method']);
            unset($allData['id']);
            $string = '';
            // if (request()->hasFile('img')) {
            //     $file = request()->file('img');
            //     unset($allData['img']);
            //     $location = 'category_img';
            //     $filename = $file->getClientOriginalName();
            //     $file->move($location, $filename);
            //     $url_file_name = $URL . '/' . $location . '/' .  $filename;
            //     $string = $string . 'img' . "='" . $url_file_name . "',";
            // };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `category` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

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

    public function deleteCategory()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from category
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
                    'message' => 'Terjadi kesalahan'
                ],
            ];
        }
    }
}
