<?php
namespace Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
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
    public function findAll()
    {
        //$result = parent::findAll();
        //b = $this->getEntityManager()->createQueryBuilder();

        $em = $this->getEntityManager();
        $query = $em->createQuery('select p from \Entity\Shop\Product\Product p');
        $query->useResultCache(true);
        $query->setResultCacheLifetime(3600);
        $result = $query->getResult();

        return $result;
    }

}
