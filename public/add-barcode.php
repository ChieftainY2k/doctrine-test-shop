<?php


/**
 *
 */
function run()
{

    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $productId = !empty($_GET['id']) ? $_GET['id'] : 1;

    /** @var \Entity\Shop\Product\Product $product */
    $product = $em->find(\Entity\Shop\Product\Product::class, $productId);
    if (!$product) {
        throw new Exception("Cannot find product.");
    }

    //\Doctrine\Common\Util\Debug::dump($product); exit;

    //creater new barcode
    $barcode = new \Entity\Shop\Product\Barcode();
    $barcode->setShop($product->getShop());
    $barcode->setValue(date("Ymd-His"));

    //attach barcode
    $product->addBarcode($barcode);

    //show propduct and all codes
    echo "product: " . $product->getName();
    foreach ($product->getBarcodes() as $barcode) {
        echo "<br>code: " . $barcode->getValue();
    }

    //$em->persist($product); //generates CASCADE exception !
    //$em->persist($barcode);
    $em->flush();

    echo "<hr>Barcode #" . $barcode->getId() . " with value " . $barcode->getValue() . " added to product #" . $product->getId();

}

run();