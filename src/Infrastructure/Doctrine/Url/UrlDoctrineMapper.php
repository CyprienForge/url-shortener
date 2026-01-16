<?php

namespace App\Infrastructure\Doctrine\Url;

use App\Domain\Entity\Url;

class UrlDoctrineMapper
{

    public function toInfra(Url $url) : UrlDoctrine
    {
        $urlDoctrine = new UrlDoctrine();
        $urlDoctrine->setLongUrl($url->getLongUrl());
        $urlDoctrine->setShortUrl($url->getShortUrl());
        return $urlDoctrine;
    }

    public function toDomain(UrlDoctrine $urlDoctrine) : Url
    {
        $url = new Url($urlDoctrine->getLongUrl(), $urlDoctrine->getShortUrl());
        return $url;
    }
}
