<?php
namespace Entity\Shop\Product;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products_barcodes")
 */
class Barcode extends \Entity\Common
{

    /**
     * barcode value
     * @var string
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    private $value;

    /**
     * Product represented by this code
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="barcodes")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     */
    private $product;

    /**
     * Quantity of product items this code represents
     *
     * @var int
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned":true, "default":1} )
     */
    private $quantity = 1;

    /**
     * set the code text
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }


}
