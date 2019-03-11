<?php

namespace Sistema\DocumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Instructiva
 *
 * @ORM\Table(name="instructiva", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"nombre"}), @ORM\UniqueConstraint(name="codigo", columns={"codigo"})}, indexes={@ORM\Index(name="FKinstructiv410195", columns={"estadoid"}), @ORM\Index(name="FKinstructiv21671", columns={"areaid"})})
 * @ORM\Entity
 */
class Instructiva
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
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areaid", referencedColumnName="id")
     * })
     */
    private $areaid;

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estadoid", referencedColumnName="id")
     * })
     */
    private $estadoid;



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
     * @return Instructiva
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
     * @return Instructiva
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
     * Set areaid
     *
     * @param \Sistema\DocumentacionBundle\Entity\Area $areaid
     * @return Instructiva
     */
    public function setAreaid(\Sistema\DocumentacionBundle\Entity\Area $areaid = null)
    {
        $this->areaid = $areaid;

        return $this;
    }

    /**
     * Get areaid
     *
     * @return \Sistema\DocumentacionBundle\Entity\Area 
     */
    public function getAreaid()
    {
        return $this->areaid;
    }

    /**
     * Set estadoid
     *
     * @param \Sistema\DocumentacionBundle\Entity\Estado $estadoid
     * @return Instructiva
     */
    public function setEstadoid(\Sistema\DocumentacionBundle\Entity\Estado $estadoid = null)
    {
        $this->estadoid = $estadoid;

        return $this;
    }

    /**
     * Get estadoid
     *
     * @return \Sistema\DocumentacionBundle\Entity\Estado 
     */
    public function getEstadoid()
    {
        return $this->estadoid;
    }
}
