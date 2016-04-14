<?php

require "../bootstrap.php";

$em = ApplicationConfiguration::getEntityManager();
//print_r($em);

$logger = new \Doctrine\DBAL\Logging\EchoSQLLogger();
$em->getConnection()
    ->getConfiguration()
    ->setSQLLogger($logger);

$categoryRepository = $em->getRepository('\Entity\Shop\Product\Category');
$categories = $categoryRepository->findAll();


foreach ($categories as $category) {
    /* @var \Entity\Shop\Product\Category $category */
    echo "<hr>Name: " . $category->getName();
    $children = $category->getChildren();
    $parent = $category->getParent();
    if (!empty($parent)) {
        echo "<br>parent: " . $parent->getName();
    }

    if (!empty($children)) {
        foreach ($children as $child) {

            /* @var \Entity\Shop\Product\Category $child */
            echo "<br>child: " . $child->getName();
        }
    }

    //\Doctrine\Common\Util\Debug::dump($children);
}