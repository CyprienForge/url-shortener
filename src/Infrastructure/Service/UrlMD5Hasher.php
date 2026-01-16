<?php

namespace App\Infrastructure\Service;

use App\Domain\Service\UrlHasher;

class UrlMD5Hasher implements UrlHasher
{
    private const SHORT_URL_LENGTH = 7;

    public function hash(string $url): string
    {
        $md5hash = md5($url . microtime(true));
        return substr($md5hash, 0, self::SHORT_URL_LENGTH);
    }
}
