<?php

namespace App\Domain\Response\RedirectToUrl;

class RedirectToUrlResponse
{

    public function __construct(
        public string $url
    ){}

}
