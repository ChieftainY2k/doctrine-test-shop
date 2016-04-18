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
            ,rcountry = ".$customer->getResidenceAddress()->getCountry()."
            ,rcity = ".$customer->getResidenceAddress()->getCity()."
            ,rstreet = ".$customer->getResidenceAddress()->getStreet()."
            ,rcode = ".$customer->getResidenceAddress()->getPostalCode()."
            ,bcountry = ".$customer->getBillingAddress()->getCountry()."
            ,bcity = ".$customer->getBillingAddress()->getCity()."
            ,bstreet = ".$customer->getBillingAddress()->getStreet()."
            ,bcode = ".$customer->getBillingAddress()->getPostalCode()."
        ";
    }

};

run();