<?php


function run()
{

    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    //print_r($em);

    //enable logger
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $categoryId = !empty($_GET['id']) ? $_GET['id'] : 1;

    /* @var \Entity\Shop\Product\Category $category */
    $category = $em->find(\Entity\Shop\Product\Category::class, $categoryId);
    echo $category->getName();
    var_dump($category->getChildrenCategories()->count());

}

run();