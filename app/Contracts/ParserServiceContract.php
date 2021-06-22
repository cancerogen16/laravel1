<?php

namespace App\Contracts;

interface ParserServiceContract
{
    /**
     * @param string $url
     * @return int
     */
    public function parseChannel(string $url);
}
