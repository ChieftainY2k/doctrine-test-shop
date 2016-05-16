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

    $query = $em->createQuery('SELECT NEW Dto\BarcodeDto(b.value) FROM Entity\Shop\Product\Barcode b');
    $barcodes = $query->getResult(); // array of custom DTOs

    echo "<pre>"; print_r($barcodes); echo "</pre>";

}


run();