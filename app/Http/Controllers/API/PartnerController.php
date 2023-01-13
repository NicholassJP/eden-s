<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function getPartner()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $data = DB::select("SELECT * FROM `partner`");
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

    public function insertPartner()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'partner_name' => 'required',
                'img' => 'required'
            ]);

            $URL = config('app.url');
            $partner_name = request('partner_name');

            if (request()->hasFile('img')) {
                $file = request()->file('img');
                $location = 'partner_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $img_url = $URL . '/' . $location . '/' . $filename;
            };

            DB::insert("insert into partner
            (partner_name, img)
            values (?, ?)", [$partner_name, $img_url]);

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

    public function updatePartner()
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
                $location = 'partner_img';
                $filename = $file->getClientOriginalName();
                $file->move($location, $filename);
                $url_file_name = $URL . '/' . $location . '/' .  $filename;
                $string = $string . 'img' . "='" . $url_file_name . "',";
            };
            foreach ($allData as $key => $value) {
                $string = $string . $key . "='" . $value . "',";
            }
            DB::update("UPDATE `partner` set " . $string . " updated_at=CURRENT_TIMESTAMP where id = " . $id);

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

    public function deletePartner()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from partner
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
