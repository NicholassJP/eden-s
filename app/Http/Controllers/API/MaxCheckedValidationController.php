<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaxCheckedValidationController extends Controller
{
    public function getCount()
    {
        try {
            request()->validate([
                'tipe' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menambah data';
            $tipe = request('tipe');
            if ($tipe == 'person') {
                $data = json_decode(json_encode(DB::select("select count(id) count from person where checked=1")[0]), true);
            } else if ($tipe == 'project') {
                $data = json_decode(json_encode(DB::select("select count(id) count from news where checked=1")[0]), true);
            } else if ($tipe == 'service') {
                $data = json_decode(json_encode(DB::select("select count(id) count from service where checked=1")[0]), true);
            }


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
}
