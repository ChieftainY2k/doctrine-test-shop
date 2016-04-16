<?php
namespace Entity\Shop;

use Doctrine\ORM\Mapping AS ORM;
use Entity\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_shops")
 * @ORM\HasLifecycleCallbacks
 */
class Shop extends \Entity\Common
{
    use TimestampableTrait;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}
