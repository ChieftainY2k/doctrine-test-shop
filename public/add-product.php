<?php

function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $shop = $em->find(\Entity\Shop\Shop::class, 1);

    $product = new \Entity\Shop\Product\Product();
    $product->setShop($shop);
    $product->setName("Product " . date("Ymd-His"));
    $em->persist($product);
    $em->flush();

    echo "product #" . $product->getId() . " added.";

}

run();

