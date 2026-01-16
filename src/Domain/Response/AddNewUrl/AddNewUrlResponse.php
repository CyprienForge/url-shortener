<?php

namespace App\Domain\Response\AddNewUrl;

class AddNewUrlResponse
{

    public function __construct(
        public string $shortUrl
    ){}

}
