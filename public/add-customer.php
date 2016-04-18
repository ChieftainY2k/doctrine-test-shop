<?php

function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $shop = $em->find(\Entity\Shop\Shop::class, 1);

    $address = new \Embeddable\Address();
    $address->setCity("Perth");
    $address->setCountry("Australia");
    $address->setPostalCode("12345");
    $address->setStreet("Carberry Street");

    $customer = new \Entity\Shop\User\Customer();


    $customer->setShop($shop);
    $customer->setAddress($address);
    $customer->setName("Customer ".date("Ymd His"));
    $em->persist($customer);
    $em->flush();

    echo "customer #" . $customer->getId() . " added.";

}

run();

