<?php

require "../bootstrap.php";

$em = ApplicationConfiguration::getEntityManager();
//print_r($em);

//enable logger
$em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

/* @var \Entity\Shop\Product\Category $category */
$category = $em->find("\Entity\Shop\Product\Category",1);
echo $category->getName();
var_dump($category->getChildrenCategories()->count());