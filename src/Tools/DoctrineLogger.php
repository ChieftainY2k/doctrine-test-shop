<?php
namespace Tools;
use Doctrine\DBAL\Logging\EchoSQLLogger;

/**
 * Simple SQL logger to attach to ORM and dump all queries after the script ends
 * @package Tools
 */
class DoctrineLogger extends EchoSQLLogger
{
    /**
     * @var array
     */
    private $queries = [];

    /**
     * {@inheritdoc}
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->queries[] = array(
            "query"=>$sql,
            "params"=>$params
        );
    }

    public function __destruct()
    {
        echo "<hr><div style='background:#ddd; padding:3px; border: solid 1px black; overflow: auto'><pre>";
        //print_r($this->queries);
        //echo var_export($this->queries,true);
        echo json_encode($this->queries,JSON_PRETTY_PRINT);
        echo "</div></pre>";
    }

}
