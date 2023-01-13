<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryAndNewsController extends Controller
{
    public function insertCAN()
    {
        try {
            request()->validate([
                'category_id' => 'required',
                'news_id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menambah data';

            $category_id = request('category_id');
            $news_id = request('news_id');

            DB::select("insert into category_and_news
            values (" . $category_id . "," . $news_id . ")");

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

    public function deleteCAN()
    {
        try {
            request()->validate([
                'news_id' => 'required',
                'category_id' => 'required'
            ]);

            $status = true;
            $msg = 'berhasil menghapus data';

            $news_id = request('news_id');
            $category_id = request('category_id');

            DB::select("delete from category_and_news
            where news_id = " . $news_id . "
            and category_id = " . $category_id);

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
