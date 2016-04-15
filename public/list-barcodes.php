<?php
/**
 *
 */
function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $productId = !empty($_GET['id']) ? $_GET['id'] : 1;

    //Query builder
    $queryBuilder = $em->createQueryBuilder();

    //Query
    $queryBuilder->select('b')
        ->from(\Entity\Shop\Product\Barcode::class, 'b')
        //->from(\Entity\Shop\Product\Product::class, 'p')
        ->where('b.product = :productId')
        //->add("where",$queryBuilder->expr()->eq("b.product",1))
        ->orderBy('b.value', 'DESC')
        ->setParameter("productId", $productId)
        //->setFirstResult($offset = 2)
        //->setMaxResults($limit = 1)
    ;

    $query = $queryBuilder->getQuery();

    //Dump vars
    //echo "<hr>DQL query = " . $queryBuilder->getDql();

    //echo "<hr>SQL query = " . $query->getSQL();

    //$result = $query->getArrayResult();
    //echo "<hr><pre>"; print_r($result); echo "</pre>";

    $barcodes = $query->getResult();
    //\Doctrine\Common\Util\Debug::dump($result);
    foreach ($barcodes as $barcode) {
        /** @var \Entity\Shop\Product\Barcode $barcode */
        echo "<br>barcode #" . $barcode->getId() . ", value = " . $barcode->getValue();
    }

}


run();