<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getCategoryInfo(int $id)
    {
        $categoryInfo = DB::table('categories')
            ->select('categories.*')
            ->where('categories.id', '=', $id)
            ->first();

        return $categoryInfo;
    }
}
