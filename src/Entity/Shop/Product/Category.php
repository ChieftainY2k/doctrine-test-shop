<?php
namespace Entity\Shop\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Entity\Traits\ShopReferenceTrait;
use Entity\Traits\TimestampableTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="shop_categories")
 * @ORM\HasLifecycleCallbacks
 */
class Category extends \Entity\Common
{
    use TimestampableTrait;
    use ShopReferenceTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childrenCategories")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parentCategory;

    /**
     * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/extra-lazy-associations.html
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory", fetch="EXTRA_LAZY")
     */
    private $childrenCategories;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->childrenCategories = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Category
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }


    /**
     * @return Category[]
     */
    public function getChildrenCategories()
    {
        return $this->childrenCategories;
    }

}
