<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getNewsList()
    {
        $news = DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_name')
            ->orderByDesc('id')
            ->get();

        return $news;
    }

    public function getNewsInfo(int $id)
    {
        $newsInfo = DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_name')
            ->where('news.id', '=', $id)
            ->first();

        return $newsInfo;
    }
}
