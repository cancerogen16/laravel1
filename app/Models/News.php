<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public function newsList(): object
    {
        return DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_name')
            ->orderByDesc('created_at')
            ->get();
    }

    public function newsOne(int $id): object
    {
        return DB::table('news')
            ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_name')
            ->where('news.id', '=', $id)
            ->first();
    }
}
