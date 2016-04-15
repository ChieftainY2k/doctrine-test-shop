<?php

function run()
{

    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $shop = new \Entity\Shop\Shop();
    $shop->setName("Shop " . date("Ymd-His"));
    $em->persist($shop);
    $em->flush();

    echo "shop #" . $shop->getId() . " added.";

}

run();