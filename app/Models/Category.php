<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description',
    ];

    public function getCategoriesList()
    {
        return DB::table('categories')
            ->select('categories.*')
            ->get();
    }

    public function getCategoryNews(int $id)
    {
        return DB::table('news')
            ->leftJoin('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.title as category_name')
            ->where('categories.id', '=', $id)
            ->get();
    }
}
