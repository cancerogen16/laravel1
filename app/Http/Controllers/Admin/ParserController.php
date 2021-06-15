<?php

namespace App\Http\Controllers\Admin;

use App\Services\ParserService;

class ParserController extends AdminBaseController
{
    public function index(ParserService $service)
    {


        dd($service->getNews('https://news.yandex.ru/music.rss'));
    }
}
