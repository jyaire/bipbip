<?php

namespace App\Repository;

use App\Entity\Collects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Collects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collects[]    findAll()
 * @method Collects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collects::class);
    }

    public function findByDateValid()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCollect > current_date()')
            ->orderBy('c.dateCollect', 'DESC');

        $query = $qb->getQuery();

        return $query->execute();
    }

    // /**
    //  * @return Collects[] Returns an array of Collects objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Collects
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
