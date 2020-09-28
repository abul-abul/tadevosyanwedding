<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="services")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ServiceRepository")
 */
class Services
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;


    /**
     * @ORM\OneToMany(targetEntity="Items", mappedBy="services",  cascade={"persist", "remove"})
     */
    protected $items;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    protected $image;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Services
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add item.
     *
     * @param \AppBundle\Entity\Items $item
     *
     * @return Services
     */
    public function addItem(\AppBundle\Entity\Items $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item.
     *
     * @param \AppBundle\Entity\Items $item
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeItem(\AppBundle\Entity\Items $item)
    {
        return $this->items->removeElement($item);
    }

    /**
     * Get items.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set image.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $image
     *
     * @return Services
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media|null
     */
    public function getImage()
    {
        return $this->image;
    }
}
