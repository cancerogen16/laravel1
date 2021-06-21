<?php


namespace App\Contracts;

use App\Models\Source;

interface ParserServiceContract
{
    public function parseNews();

    /**
     * @param string $url
     * @return array|bool
     */
    public function getSourceInfo(string $url);
}
