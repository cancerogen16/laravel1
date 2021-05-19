<?php
// корневой контроллер
namespace App\Http\Controllers;

use Illuminate\Support\Str;

abstract class BaseController extends Controller
{
    protected $categories;
    protected $news;

    public function __construct()
    {
        $maxCategory = 5;

        $categories = [];

        $cName = 'Без категории';

        $categories[] = [
            'category_id' => 0,
            'title' => $cName,
            'slug' => Str::of($cName)->slug(),
            'parent_id' => 0,
        ];

        for ($i = 1; $i <= $maxCategory; $i++) {
            $cName = 'Категория #' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'category_id' => $i,
                'title' => $cName,
                'slug' => Str::of($cName)->slug(),
                'parent_id' => $parentId,
            ];
        }

        $this->categories = $categories;

        $startDate = time();

        for ($i = 1; $i <= $maxCategory * 4; $i++) {
            $title = 'Новость #' . $i;
            $txt = 'Текст новости';
            $isPublished = 1;

            $createdAt = date('Y-m-d H:i:s', strtotime('-'.($i+2).' day', $startDate));
            $publishedAt = date('Y-m-d H:i:s', strtotime('-'.($i+1).' day', $startDate));

            $this->news[] = [
                'id' => $i,
                'category_id' => 1 +($i%$maxCategory),
                'user_id' => (rand(1, 5) == 5) ? 1 : 2,
                'title' => $title,
                'slug' => Str::of($title)->slug(),
                'excerpt' => 'Отрывок',
                'content_raw' => $txt,
                'content_html' => $txt,
                'is_published' => $isPublished,
                'published_at' => $isPublished ? $publishedAt : null,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }
    }
}
