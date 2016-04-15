<?php
namespace Entity\Shop\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products")
 */
class Product extends \Entity\Common
{

    /**
     * shop the product belongs to
     * @var \Entity\Shop\Shop
     * @ORM\ManyToOne(targetEntity="\Entity\Shop\Shop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
     */
    private $shop;


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
