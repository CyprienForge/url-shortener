<?php

namespace App\Domain\Service;

interface UrlHasher
{

    public function hash(string $url): string;

}
