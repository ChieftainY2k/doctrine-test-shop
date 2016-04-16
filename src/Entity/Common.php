<?php
namespace Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 */
class Common
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}
