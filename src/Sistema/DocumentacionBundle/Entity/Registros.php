<?php

namespace Sistema\DocumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registros
 *
 * @ORM\Table(name="registros", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"nombre"}), @ORM\UniqueConstraint(name="codigo", columns={"codigo"})}, indexes={@ORM\Index(name="FKregistros869807", columns={"procedimientoid"})})
 *  @ORM\Entity(repositoryClass="Sistema\DocumentacionBundle\Entity\RegistrosRepository")
 */
class Registros
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var \Procedimiento
     *
     * @ORM\ManyToOne(targetEntity="Procedimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="procedimientoid", referencedColumnName="id")
     * })
     */
    private $procedimientoid;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Registros
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Registros
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set procedimientoid
     *
     * @param \Sistema\DocumentacionBundle\Entity\Procedimiento $procedimientoid
     * @return Registros
     */
    public function setProcedimientoid(\Sistema\DocumentacionBundle\Entity\Procedimiento $procedimientoid = null)
    {
        $this->procedimientoid = $procedimientoid;

        return $this;
    }

    /**
     * Get procedimientoid
     *
     * @return \Sistema\DocumentacionBundle\Entity\Procedimiento 
     */
    public function getProcedimientoid()
    {
        return $this->procedimientoid;
    }
}
