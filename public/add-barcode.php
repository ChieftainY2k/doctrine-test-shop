<?php

require "../bootstrap.php";

$em = ApplicationConfiguration::getEntityManager();
$em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

/** @var \Entity\Shop\Product\Product $product */
$product = $em->find("\Entity\Shop\Product\Product", $productId = 1);


//\Doctrine\Common\Util\Debug::dump($product); exit;

//creater new barcode
$barcode = new \Entity\Shop\Product\Barcode();
$barcode->setValue(date("Ymd-His"));

//attach barcode
$product->addBarcode($barcode);

//show propduct and all codes
echo "product: ".$product->getName();
foreach($product->getBarcodes() as $barcode)
{
    echo "<br>code: ".$barcode->getValue();
}

//$em->persist($product); //generates CASCADE exception !
//$em->persist($barcode);
$em->flush();

echo "<hr>Barcode ".$barcode->getValue()." added.";