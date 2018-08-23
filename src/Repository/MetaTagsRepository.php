<?php

namespace App\Repository;

use App\Entity\MetaTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MetaTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetaTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetaTags[]    findAll()
 * @method MetaTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetaTagsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MetaTags::class);
    }

//    /**
//     * @return MetaTags[] Returns an array of MetaTags objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MetaTags
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
