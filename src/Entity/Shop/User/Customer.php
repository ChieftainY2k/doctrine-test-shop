<?php
namespace Entity\Shop\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Entity\Traits\ShopReferenceTrait;
use Entity\Traits\TimestampableTrait;
use Embeddable\Address;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_customers")
 * @ORM\HasLifecycleCallbacks
 */
class Customer extends \Entity\Common
{
    use TimestampableTrait;
    use ShopReferenceTrait;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;
    
    /**
     * Customer address
     * @var Address
     * @ORM\Embedded(class = "Embeddable\Address", columnPrefix = "residenceAddress_")
     */
    private $residenceAddress;

    /**
     * Customer address
     * @var Address
     * @ORM\Embedded(class = "Embeddable\Address", columnPrefix = "billingAddress_")
     */
    private $billingAddress;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->residenceAddress = new Address();
    }

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

    /**
     * @return Address
     */
    public function getResidenceAddress()
    {
        return $this->residenceAddress;
    }

    /**
     * @param Address $residenceAddress
     */
    public function setResidenceAddress(Address $residenceAddress)
    {
        $this->residenceAddress = $residenceAddress;
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     */
    public function setBillingAddress(Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }


}
