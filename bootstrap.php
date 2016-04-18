<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/vendor/autoload.php";

class ApplicationConfiguration
{
    static function getEntityManager()
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = true;
        $proxyDir = null;

        $cache = null;
        //$cache = new \Doctrine\Common\Cache\FilesystemCache("./cache/");

        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(
            array(
                __DIR__ . "/src"
            ),
            $isDevMode,
            $proxyDir,
            $cache,
            $useSimpleAnnotationReader
        );


        // or if you prefer yaml or XML
        //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

        // database configuration parameters
        /*
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../db.sqlite',
        );
        */

        $conn = array(
            'driver' => 'pdo_mysql',
            'dbname' => 'mydatabase',
            'user' => 'mydbuser',
            'password' => 'mydbpassword',
            'host' => 'localhost'

        );

        // obtaining the entity manager
        $entityManager = EntityManager::create($conn, $config);

        return $entityManager;
    }
}

