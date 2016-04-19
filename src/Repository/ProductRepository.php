<?php
namespace Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;


class ProductRepository extends EntityRepository
{

    public function __construct($em,$class)
    {
        parent::__construct($em, $class);
    }

    /**
     * Use cache
     * @return array
     */
    public function findAllOptimizedAndCached()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('
          select p,b,s 
            from \Entity\Shop\Product\Product p
            join p.barcodes b
            join p.shop s
          ');
        $query->useResultCache(true);
        $query->setResultCacheLifetime(10);

        $result = $query->getResult();

        return $result;
    }

}
