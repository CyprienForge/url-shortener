<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Url;

interface UrlRepository
{

    public function addNewUrl(Url $url) : void;
    public function getUrl(string $hashUrl) : Url;

}
