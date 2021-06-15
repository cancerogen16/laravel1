<?php


namespace App\Contracts;


interface ParserServiceContract
{
    /**
     * @param string $url
     * @return array
     */
    public function getNews(string $url): array;
}
