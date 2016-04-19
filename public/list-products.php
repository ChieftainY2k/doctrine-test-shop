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
    /* @var $productRepository Repository\ProductRepository */


    //$products = $productRepository->findAll();
    $products = $productRepository->findAllOptimizedAndCached();

    foreach ($products as $product) {

        /* @var \Entity\Shop\Product\Product $product */
        echo "<hr>Product #" . $product->getId() . " , name =  " . $product->getName() . " , viewCount = " . $product->getViewCount() . ", shop: " . $product->getShop()->getName() . "";
        if (count($product->getBarcodes())) {

            foreach ($product->getBarcodes() as $barcode) {

                echo "<li>Barcode: , id #" . $barcode->getId() . " , value = " . $barcode->getValue() . "";

            }
        }

        //update view count
        //$product->setViewCount($product->getViewCount()+1);
    }


    $em->flush();
}


run();