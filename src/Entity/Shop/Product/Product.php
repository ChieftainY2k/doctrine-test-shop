<?php
namespace Entity\Shop\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Entity\Traits\ShopReferenceTrait;
use Entity\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products")
 * @ORM\HasLifecycleCallbacks
 */
class Product extends \Entity\Common
{
    use TimestampableTrait;
    use ShopReferenceTrait;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @var Barcode[]
     * @ORM\OneToMany(targetEntity="Barcode", mappedBy="product", fetch="EXTRA_LAZY", cascade={"persist", "remove"})
     */
    private $barcodes;

    /**
     *
     */
    public function __construct()
    {
        $this->barcodes = new ArrayCollection();
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add a barcode to the product
     * @param Barcode $barcode
     */
    public function addBarcode(Barcode $barcode)
    {
        $barcode->setProduct($this);
        $this->barcodes->add($barcode);
    }

    /**
     * Get all barcodes
     * @return ArrayCollection|Barcode[]
     */
    public function getBarcodes()
    {
        return $this->barcodes;
    }

}
