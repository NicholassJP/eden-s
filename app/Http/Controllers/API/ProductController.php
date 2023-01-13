<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $service_id = request('service_id');
            $data = DB::select("SELECT * FROM `product` where service_id like '%" . $service_id . "%'");
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

    public function insertProduct()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'service_id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'img' => 'required'
            ]);

            $URL = config('app.url');
            $service_id = request('service_id');
            $title = request('title');
            $description = request('description');

            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $location = 'product_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $img_url = $URL . '/' . $location . '/' . $filename;
            };

            DB::insert("insert into product
            (service_id, title, description, img)
            values (?, ?, ?, ?)", [$service_id, $title, $description, $img_url]);

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

    public function updateProduct()
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
                $location = 'product_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $url_file_name = $URL . '/' . $location . '/' .  $filename;
                $string = $string . 'img' . "='" . $url_file_name . "',";
            };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `product` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

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

    public function deleteProduct()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from product
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
