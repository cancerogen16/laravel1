<?php

namespace App\Services;

use App\Contracts\ParserServiceContract;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Str;

class ParserService implements ParserServiceContract
{
    public function parseNews(): void
    {
        $sources = Source::all();

        foreach ($sources as $source) {
            $channel = $this->getSourceInfo($source->url);

            $categoryName = $channel['title'];

            // Проверяем, если категория уже существует в базе данных
            $category = Category::query()->where('title', $categoryName)->first();
            // Если нет, то сохраняем
            if (!$category) {
                $fields = [
                    'title' => $categoryName,
                    'slug' => $this->createSlug($categoryName),
                    'description' => $channel['description'],
                ];

                $category = Category::create($fields);
            }

            foreach ($channel['news'] as $news) {
                // Проверяем, если новость уже существует в базе данных
                $post = News::query()->where('title', $news['title'])->first();
                // Если нет, то сохраняем
                if (!$post) {
                    $fields = [
                        'category_id' => $category->id,
                        'title' => $news['title'],
                        'slug' => $this->createSlug($news['title']),
                        'description' => $news['description'],
                        'status' => 'published',
                    ];

                    News::create($fields);
                }
            }
        }
    }

    /**
     * @param string $url
     * @return array
     */
    public function getSourceInfo(string $url): array
    {
        $xml = \XmlParser::load($url);

        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
    }

    /**
     * @param $title
     * @param int $id
     * @return string
     */
    public function createSlug($title, int $id = 0): string
    {
        $slug = Str::slug($title);

        $allSlugs = $this->getRelatedSlugs($slug, $id);

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        $is_contain = true;

        do {
            $newSlug = $slug . '-' . $i;

            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }

            $i++;
        } while ($is_contain);

        return $title;
    }

    /**
     * @param $slug
     * @param int $id
     * @return mixed
     */
    protected function getRelatedSlugs($slug, int $id = 0)
    {
        return News::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
