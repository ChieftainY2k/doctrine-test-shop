<?php
namespace Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 */
class CommonWithShop extends Common
{

    /**
     * shop the product belongs to
     * @var \Entity\Shop\Shop
     * @ORM\ManyToOne(targetEntity="\Entity\Shop\Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
     */
    private $shop;

    /**
     * get parent shop 
     * @return Shop\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * set parent shop
     * @param Shop\Shop $shop
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
    }


}
