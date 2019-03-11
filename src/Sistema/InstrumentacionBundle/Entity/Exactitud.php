<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exactitud
 *
 * @ORM\Table(name="exactitud")
 * @ORM\Entity
 */
class Exactitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="exactitudes", type="string", length=255, nullable=true)
     */
    private $exactitudes;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set exactitudes
     *
     * @param string $exactitudes
     * @return Exactitud
     */
    public function setExactitudes($exactitudes)
    {
        $this->exactitudes = $exactitudes;

        return $this;
    }

    /**
     * Get exactitudes
     *
     * @return string 
     */
    public function getExactitudes()
    {
        return $this->exactitudes;
    }
    public function __toString() {
        return $this->getExactitudes();
    }
}
