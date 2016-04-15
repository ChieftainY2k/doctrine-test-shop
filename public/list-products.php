<?php
/**
 *
 */
function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $productRepository = $em->getRepository(\Entity\Shop\Product\Product::class);
    $products = $productRepository->findAll();


    foreach ($products as $product) {
        /* @var \Entity\Shop\Product\Product $product */
        echo "<hr>Product #".$product->getId()." , name =  " . $product->getName()." , shop: ".$product->getShop()->getName()."";
        if (count($product->getBarcodes()))
        {
            foreach($product->getBarcodes() as $barcode)
            {
                echo "<li>Barcode: , id #".$barcode->getId()." , value = " . $barcode->getValue(). "";
            }
        }
    }

};

run();