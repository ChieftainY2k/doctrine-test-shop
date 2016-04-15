<?php
namespace Entity\Shop;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_shops")
 */
class Shop extends \Entity\Common
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;


}
