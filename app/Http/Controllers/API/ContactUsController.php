<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function getInbox()
    {
        try {
            $status = true;
            $msg = 'berhasil mengambil data';
            $data = DB::select("SELECT * FROM `inbox` order by created_at desc");
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

    public function insertInbox()
    {
        try {
            $status = true;
            $msg = 'berhasil menambah data';

            request()->validate([
                'name' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'category' => 'required',
                'subcategory' => 'required',
                'message' => 'required'
            ]);
            $name = request('name');
            $phone_number = request('phone_number');
            $email = request('name');
            $category = request('category');
            $subcategory = request('subcategory');
            $message = request('message');

            DB::insert("insert into inbox
            (name, phone_number, email, category, subcategory, message)
            values (?, ?, ?, ?, ?, ?)", [$name, $phone_number, $email, $category, $subcategory, $message]);

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

    public function deleteInbox()
    {
        try {
            request()->validate([
                'id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $id = request('id');

            DB::select("delete from inbox
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
