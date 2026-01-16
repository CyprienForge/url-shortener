<?php

namespace App\Infrastructure\Doctrine\Url;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'url')]
class UrlDoctrine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2048)]
    private ?string $longUrl = null;

    #[ORM\Column(length: 64)]
    private ?string $shortUrl = null;

    public function getLongUrl(): ?string
    {
        return $this->longUrl;
    }

    public function setLongUrl(?string $longUrl): static
    {
        $this->longUrl = $longUrl;
        return $this;
    }

    public function getShortUrl(): ?string
    {
        return $this->shortUrl;
    }

    public function setShortUrl(?string $shortUrl): void
    {
        $this->shortUrl = $shortUrl;
    }

}
