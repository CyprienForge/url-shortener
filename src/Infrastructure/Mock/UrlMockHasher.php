<?php

namespace App\Infrastructure\Mock;

use App\Domain\Service\UrlHasher;

class UrlMockHasher implements UrlHasher
{
    public function hash(string $url): string
    {
        return hash_hmac('sha256', $url, 'secret');
    }
}
