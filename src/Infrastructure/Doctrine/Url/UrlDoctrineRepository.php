<?php

namespace App\Infrastructure\Doctrine\Url;

use App\Domain\Entity\Url;
use App\Domain\Repository\UrlRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;

class UrlDoctrineRepository extends ServiceEntityRepository implements UrlRepository
{
    public function __construct(private EntityManagerInterface $em, private UrlDoctrineMapper $mapper, ManagerRegistry $registry){
        parent::__construct($registry, UrlDoctrine::class);
    }

    public function addNewUrl(Url $url): void
    {
        $urlInfra = $this->mapper->toInfra($url);
        $this->em->persist($urlInfra);
        $this->em->flush();
    }

    public function getUrl(string $hashUrl): Url
    {
        $url = $this->findOneBy(['shortUrl' => $hashUrl]);
        if($url == null){
            throw new EntityNotFoundException("Url doesn't exist");
        }
        return $this->mapper->toDomain($url);
    }
}
