<?php


function run()
{

    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    //print_r($em);

    //enable logger
    //$em->getConnection()->getConfiguration()->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $categoryRepository = $em->getRepository('\Entity\Shop\Product\Category');
    $categories = $categoryRepository->findAll();


    foreach ($categories as $category) {
        /* @var \Entity\Shop\Product\Category $category */
        echo "<hr>Name: " . $category->getName();
        $children = $category->getChildrenCategories();
        $parent = $category->getParentCategory();
        echo "<br>parent: ";
        echo (!empty($parent)) ? $parent->getName() : "-";

        if ($children->count()) {
            foreach ($children as $child) {
                echo "<br>child: " . $child->getName();
            }
        } else {
            echo "<br>child: -";
        }

        //\Doctrine\Common\Util\Debug::dump($children);
    }


}

run();