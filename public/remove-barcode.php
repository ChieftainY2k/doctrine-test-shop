<?php
/**
 *
 */
function run()
{
    require "../bootstrap.php";

    $em = ApplicationConfiguration::getEntityManager();
    $em->getConnection()->getConfiguration()->setSQLLogger(new \Tools\DoctrineLogger());

    $barcodeId = !empty($_GET['id']) ? $_GET['id'] : 2;

    $barcodeRepository = $em->getRepository(\Entity\Shop\Product\Barcode::class);
    $barcode = $barcodeRepository->find($barcodeId);
    if (!$barcode )
    {
        throw new Exception("Cannot find barcode.");
    }

    $em->remove($barcode);

    $em->flush();

    echo "Barcode #$barcodeId removed.";

};

run();