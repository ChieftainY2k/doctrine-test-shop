<?php

require "../bootstrap.php";

$em = ApplicationConfiguration::getEntityManager();
$em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

$product = new \Entity\Shop\Product\Product();
$product->setName("Product ".date("Ymd-His"));
$em->persist($product);
$em->flush();

echo "product #".$product->getId()." added.";