<?php

namespace App\Domain\Request\RedirectToUrl;

class RedirectToUrlRequest
{

    public function __construct(
        public string $hashUrl
    ){}

}
