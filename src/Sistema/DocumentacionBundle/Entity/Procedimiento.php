<?php

namespace Sistema\DocumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Symfony\Component\Validator\ExecutionContext;
/**
 * Procedimiento
 *
 * @ORM\Table(name="procedimiento", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"nombre"}), @ORM\UniqueConstraint(name="codigo", columns={"codigo"})}, indexes={@ORM\Index(name="FKprocedimie691248", columns={"estadoid"}), @ORM\Index(name="FKprocedimie151524", columns={"areaid"})})
 * @ORM\Entity(repositoryClass="Sistema\DocumentacionBundle\Entity\ProcedimientoRepository")
 */
class Procedimiento
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
     * @Assert\NotBlank(message= "Por favor escribe tu nombre");
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     * @Assert\NotBlank( message = "Escribe tu nombre")
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="anno", type="date", nullable=false)
     * 
     */
    private $anno;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=false)
     */
    private $version;

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
     * @return Procedimiento
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
     * @return Procedimiento
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
     * Set anno
     *
     * @param \DateTime $anno
     * @return Procedimiento
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return \DateTime 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Procedimiento
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set areaid
     *
     * @param \Sistema\DocumentacionBundle\Entity\Area $areaid
     * @return Procedimiento
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
     * @return Procedimiento
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
    
    public function __toString() {
      return $this->getNombre() ;
    }
}
