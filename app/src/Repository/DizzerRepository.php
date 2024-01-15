<?php

namespace App\Repository;

use App\Entity\Dizzer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dizzer>
 *
 * @method Dizzer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dizzer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dizzer[]    findAll()
 * @method Dizzer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DizzerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dizzer::class);
    }

//    /**
//     * @return Dizzer[] Returns an array of Dizzer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Dizzer
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
