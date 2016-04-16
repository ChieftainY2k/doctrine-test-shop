<?php
namespace Entity\Traits;

use Doctrine\ORM\Mapping AS ORM;

/**
 * Trait to make entity "timestampable" on creation / update
 *
 * Requires that entities which use this trait are marked with the @HasLifecycleCallbacks annotation.
 *
 * @ORM\HasLifecycleCallbacks
 */
trait TimestampableTrait
{

    /**
     * Creation datetime
     * @var \DateTime
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected $createdAt;

    /**
     * Update datetime
     * @var \DateTime
     * @ORM\Column(type="datetime",nullable=false)
     */
    protected $updatedAt;

    /**
     * Update timestamps on save
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
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
