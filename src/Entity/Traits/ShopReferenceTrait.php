<?php
namespace Entity\Traits;

use Doctrine\ORM\Mapping AS ORM;

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
     * @var \Entity\Shop\Shop
     * @ORM\ManyToOne(targetEntity="\Entity\Shop\Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
     */
    private $shop;

    /**
     * get parent shop
     * @return \Entity\Shop\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * set parent shop
     * @return \Entity\Shop\Shop
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
    }


}
