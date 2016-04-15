<?php
/**
 *
 */
function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $productId = !empty($_GET['id']) ? $_GET['id'] : 2;

    $productRepository = $em->getRepository(\Entity\Shop\Product\Product::class);
    $product = $productRepository->find($productId);
    if (!$product )
    {
        throw new Exception("Cannot find product.");
    }

    $em->remove($product);

    $em->flush();

    echo "Product #$productId removed.";

};

run();