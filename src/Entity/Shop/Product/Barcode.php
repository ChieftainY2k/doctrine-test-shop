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
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $code;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="barcodes")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
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
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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


}
