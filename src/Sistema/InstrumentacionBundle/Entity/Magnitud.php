<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magnitud
 *
 * @ORM\Table(name="magnitud", uniqueConstraints={@ORM\UniqueConstraint(name="magnitudes", columns={"magnitudes"})})
 * @ORM\Entity
 */
class Magnitud
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
     * @ORM\Column(name="magnitudes", type="string", length=255, nullable=false)
     */
    private $magnitudes;



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
     * Set magnitudes
     *
     * @param string $magnitudes
     * @return Magnitud
     */
    public function setMagnitudes($magnitudes)
    {
        $this->magnitudes = $magnitudes;

        return $this;
    }

    /**
     * Get magnitudes
     *
     * @return string 
     */
    public function getMagnitudes()
    {
        return $this->magnitudes;
    }
    public function __toString() {
        return $this->getMagnitudes();
    }
}
