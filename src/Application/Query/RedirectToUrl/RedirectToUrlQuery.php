<?php

namespace App\Application\Query\RedirectToUrl;

use App\Domain\Repository\UrlRepository;
use App\Domain\Request\RedirectToUrl\RedirectToUrlRequest;
use App\Domain\Response\RedirectToUrl\RedirectToUrlResponse;

class RedirectToUrlQuery
{
    public function __construct(
        private UrlRepository $urlRepository,
    ){}

    public function execute(RedirectToUrlRequest $request) : RedirectToUrlResponse
    {
        $url = $this->urlRepository->getUrl($request->hashUrl);
        return new RedirectToUrlResponse($url->getLongUrl());
    }

}
