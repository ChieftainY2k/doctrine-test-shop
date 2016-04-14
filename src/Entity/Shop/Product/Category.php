<?php
namespace Entity\Shop\Product;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Category
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childrenCategories")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parentCategory;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory")
     */
    private $childrenCategories;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

}
