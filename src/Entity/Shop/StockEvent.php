<?php
namespace Entity\Shop;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Entity\Shop\Product\Product;
use Entity\Traits\ShopReferenceTrait;
use Entity\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="StockEventRepository")
 * @ORM\Table(name="shop_stock_events")
 * @ORM\HasLifecycleCallbacks
 */
class StockEvent extends \Entity\Common
{
    use TimestampableTrait;
    use ShopReferenceTrait;

    const TYPE_PRODUCT_PURCHASED = 1;
    const TYPE_PRODUCT_SOLD = 2;

    /**
     * Event type
     * @var int
     * @ORM\Column(type="smallint",nullable=false)
     */
    protected $type;

    /**
     * Product represented by this code
     * @var Product
     * @ORM\ManyToOne(targetEntity="Entity\Shop\Product\Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    protected $product;

    /**
     * Product quantity
     * @var int
     * @ORM\Column(type="smallint",nullable=false)
     */
    protected $quantity;

    /**
     * price
     * @var int
     * @ORM\Column(type="smallint",nullable=false)
     */
    protected $productPriceNet;

    /**
     * event date and time
     * @var \DateTime
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected $eventDateTime;


    /**
     * get type
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     * @param mixed $type
     * @throws \Exception
     */
    public function setType($type)
    {
        if (!in_array($type,array(self::TYPE_PRODUCT_PURCHASED,self::TYPE_PRODUCT_SOLD)))
        {
            throw new \Exception("Invalid type");
        }
        $this->type = $type;
    }


}
