<?php
namespace Entity\Traits;

use Doctrine\ORM\Mapping AS ORM;
use Entity\Shop\Shop;

/**
 * Trait which defines reference to a shop as parent
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 */
trait ShopReferenceTrait
{

    /**
     * shop the product belongs to
     * @var Shop
     * @ORM\ManyToOne(targetEntity="\Entity\Shop\Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
     */
    private $shop;

    /**
     * get parent shop
     * @return Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * set parent shop
     * @param \Entity\Shop\Shop
     */
    public function setShop(Shop $shop)
    {
        $this->shop = $shop;
    }


}
