<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serviciopor
 *
 * @ORM\Table(name="serviciopor", uniqueConstraints={@ORM\UniqueConstraint(name="servicio", columns={"servicio"})})
 * @ORM\Entity
 */
class Serviciopor
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
     * @ORM\Column(name="servicio", type="string", length=255, nullable=true)
     */
    private $servicio;



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
     * Set servicio
     *
     * @param string $servicio
     * @return Serviciopor
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string 
     */
    public function getServicio()
    {
        return $this->servicio;
    }
    public function __toString() {
        return $this->getServicio();
    }
}
