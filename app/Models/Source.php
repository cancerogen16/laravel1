<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    public function sourcesList(): object
    {
        return DB::table('sources')
            ->select('sources.*')
            ->orderByDesc('created_at')
            ->get();
    }
}
