<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Situacion
 *
 * @ORM\Table(name="situacion")
 * @ORM\Entity
 */
class Situacion
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
     * @ORM\Column(name="situaciones", type="string", length=255, nullable=true)
     */
    private $situaciones;



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
     * Set situaciones
     *
     * @param string $situaciones
     * @return Situacion
     */
    public function setSituaciones($situaciones)
    {
        $this->situaciones = $situaciones;

        return $this;
    }

    /**
     * Get situaciones
     *
     * @return string 
     */
    public function getSituaciones()
    {
        return $this->situaciones;
    }
    public function __toString() {
        return $this->getSituaciones();
    }
}
