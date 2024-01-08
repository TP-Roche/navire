<?php

namespace App\Repository;

use App\Entity\Port;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\AisShipType;

/**
 * @extends ServiceEntityRepository<Port>
 *
 * @method Port|null find($id, $lockMode = null, $lockVersion = null)
 * @method Port|null findOneBy(array $criteria, array $orderBy = null)
 * @method Port[]    findAll()
 * @method Port[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Port::class);
    }

    public function findPortsCompatiblesByAisShipType(AisShipType $aisShipType): array {
        return $this->createQueryBuilder('p')
                        ->join('p.types', 't')
                        ->where('t.id = :aisShipTypeId')
                        ->setParameter('aisShipTypeId', $aisShipType->getId())
                        ->getQuery()
                        ->getResult();
    }

//    /**
//     * @return Port[] Returns an array of Port objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }
//    public function findOneBySomeField($value): ?Port
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
