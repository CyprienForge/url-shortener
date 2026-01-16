<?php

namespace App\Application\Command\AddNewUrl;

use App\Domain\Entity\Url;
use App\Domain\Repository\UrlRepository;
use App\Domain\Request\AddNewUrl\AddNewUrlRequest;
use App\Domain\Response\AddNewUrl\AddNewUrlResponse;
use App\Domain\Service\UrlHasher;

class AddNewUrlCommand
{
    public function __construct(
        private UrlHasher $urlHasher,
        private UrlRepository $urlRepository,
    ){}
    public function execute(AddNewUrlRequest $addNewUrlRequest): AddNewUrlResponse
    {
        $shortUrl = $this->urlHasher->hash($addNewUrlRequest->newUrl);
        $url = new Url($addNewUrlRequest->newUrl, $shortUrl);
        $this->urlRepository->addNewUrl($url);

        return new AddNewUrlResponse($shortUrl);
    }

}
