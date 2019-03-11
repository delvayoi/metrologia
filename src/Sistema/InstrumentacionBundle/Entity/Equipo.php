<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"equipos"})})
 * @ORM\Entity
 */
class Equipo
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
     * @ORM\Column(name="equipos", type="string", length=255, nullable=true)
     */
    private $equipos;



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
     * Set equipos
     *
     * @param string $equipos
     * @return Equipo
     */
    public function setEquipos($equipos)
    {
        $this->equipos = $equipos;

        return $this;
    }

    /**
     * Get equipos
     *
     * @return string 
     */
    public function getEquipos()
    {
        return $this->equipos;
    }
    public function __toString() {
        return $this->getEquipos();
    }
}
