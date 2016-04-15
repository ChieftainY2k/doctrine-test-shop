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
     * Creation datetime
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * Update datetime
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @param \DateTime $date
     */
    public function setCreatedAt(\DateTime $date)
    {
        $this->createdAt = $date;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $date
     */
    public function setUpdatedAt(\DateTime $date)
    {
        $this->updatedAt = $date;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

}
