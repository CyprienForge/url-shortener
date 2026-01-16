<?php

namespace App\Domain\Request\AddNewUrl;

class AddNewUrlRequest
{

    public function __construct(
        public string $newUrl,
    ){}

}
