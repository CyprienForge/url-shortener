<?php

namespace App\Domain\Entity;

class Url
{
    public function __construct(
        string $longUrl,
        string $shortUrl,
    ){
        $this->longUrl = $longUrl;
        $this->shortUrl = $shortUrl;
    }
    private int $id;
    private string $longUrl;
    private string $shortUrl;

    public function getLongUrl(): string
    {
        return $this->longUrl;
    }

    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }
}
