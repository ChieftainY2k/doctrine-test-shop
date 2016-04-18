<?php
/**
 *
 */
function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $customerRepository = $em->getRepository(\Entity\Shop\User\Customer::class);
    $customers = $customerRepository->findAll();


    foreach ($customers as $customer) {
        /* @var \Entity\Shop\User\Customer $customer */
        echo "<br>Customer #".$customer->getId()." , 
            name =  " . $customer->getName()."  
            ,country = ".$customer->getAddress()->getCountry()."
            ,city = ".$customer->getAddress()->getCity()."
            ,street = ".$customer->getAddress()->getStreet()."
            ,code = ".$customer->getAddress()->getPostalCode()."
        ";
    }

};

run();