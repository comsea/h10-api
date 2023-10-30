<?php

namespace App\Repository;

use App\Entity\Actualité;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Actualité>
 *
 * @method Actualité|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actualité|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actualité[]    findAll()
 * @method Actualité[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualitéRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actualité::class);
    }

//    /**
//     * @return Actualité[] Returns an array of Actualité objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Actualité
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
