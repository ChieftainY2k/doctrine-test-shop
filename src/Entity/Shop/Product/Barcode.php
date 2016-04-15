<?php
namespace Entity\Shop\Product;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_products_barcodes")
 * @ORM\HasLifecycleCallbacks
 */
class Barcode
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * Creation datetime
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Update datetime
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * Quantity of product items this code represents
     *
     * @var int
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned":true, "default":1} )
     */
    private $quantity = 1;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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
     * Update timestamps on save
     *
     * @ORM\PrePersist
     */
    public function updateTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));

        if (is_null($this->getCreatedAt())) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function setCreatedAt(\DateTime $date)
    {
        $this->createdAt = $date;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(\DateTime $date)
    {
        $this->updatedAt = $date;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
