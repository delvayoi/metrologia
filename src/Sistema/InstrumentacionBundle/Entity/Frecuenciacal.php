<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frecuenciacal
 *
 * @ORM\Table(name="frecuenciacal", uniqueConstraints={@ORM\UniqueConstraint(name="frecuencia", columns={"frecuencia"})})
 * @ORM\Entity
 */
class Frecuenciacal
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
     * @ORM\Column(name="frecuencia", type="string", length=255, nullable=false)
     */
    private $frecuencia;



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
     * Set frecuencia
     *
     * @param string $frecuencia
     * @return Frecuenciacal
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return string 
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }
    public function __toString() {
        return $this->getFrecuencia();
    }
}
