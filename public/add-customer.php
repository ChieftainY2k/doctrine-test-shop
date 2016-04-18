<?php

function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $shop = $em->find(\Entity\Shop\Shop::class, 1);

    $residenceAddress = new \Embeddable\Address();
    $residenceAddress->setCity("Perth");
    $residenceAddress->setCountry("Australia");
    $residenceAddress->setPostalCode("12345");
    $residenceAddress->setStreet("Carberry Street");

    $billingAddress = new \Embeddable\Address();
    $billingAddress->setCity("Sydney");
    $billingAddress->setCountry("Australia");
    $billingAddress->setPostalCode("99887");
    $billingAddress->setStreet("Downtown");

    $customer = new \Entity\Shop\User\Customer();


    $customer->setShop($shop);
    $customer->setResidenceAddress($residenceAddress);
    $customer->setBillingAddress($billingAddress);
    $customer->setName("Customer ".date("Ymd His"));
    $em->persist($customer);
    $em->flush();

    echo "customer #" . $customer->getId() . " added.";

}

run();

