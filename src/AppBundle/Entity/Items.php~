<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ItemsRepository")
 */
class Items
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
     * @ORM\Column(name="video", type="string", nullable=true)
     */
    protected $video;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"})
     */
    protected $image;



    /**
     *
     * @ORM\ManyToOne(targetEntity="Services", inversedBy="Items")
     * @ORM\JoinColumn(name="services_id", referencedColumnName="id" )
     */
    protected $services;











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
     * Set image.
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media|null $image
     *
     * @return Items
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



    /**
     * Set services.
     *
     * @param \AppBundle\Entity\Services|null $services
     *
     * @return Items
     */
    public function setServices(\AppBundle\Entity\Services $services = null)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services.
     *
     * @return \AppBundle\Entity\Services|null
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set video.
     *
     * @param string $video
     *
     * @return Items
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video.
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }
}
