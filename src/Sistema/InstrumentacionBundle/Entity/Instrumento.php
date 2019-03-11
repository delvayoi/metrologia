<?php

namespace Sistema\InstrumentacionBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instrumento
 *
 * @ORM\Table(name="instrumento", uniqueConstraints={@ORM\UniqueConstraint(name="codigo", columns={"codigo"})}, indexes={@ORM\Index(name="IDX_F75182444A751D7A", columns={"areaid"}), @ORM\Index(name="IDX_F7518244AEAF7A49", columns={"equipoid"}), @ORM\Index(name="IDX_F7518244435AB22B", columns={"magnitudid"}), @ORM\Index(name="IDX_F75182446CB7D61D", columns={"exactitudid"}), @ORM\Index(name="nombre", columns={"nombre"}), @ORM\Index(name="IDX_F75182448025FCC0", columns={"situacionid"})})
 * @ORM\Entity
 */
class Instrumento
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
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="rango", type="string", length=255, nullable=true)
     * 
     */
    private $rango;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255, nullable=true)
     */
    private $modelo;

    /**
     * @var \Situacion
     *
     * @ORM\ManyToOne(targetEntity="Situacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="situacionid", referencedColumnName="id")
     * })
     */
    private $situacionid;

    /**
     * @var \Magnitud
     *
     * @ORM\ManyToOne(targetEntity="Magnitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="magnitudid", referencedColumnName="id")
     * })
     */
    private $magnitudid;

    /**
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="Sistema\DocumentacionBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areaid", referencedColumnName="id")
     * })
     */
    private $areaid;

    /**
     * @var \Exactitud
     *
     * @ORM\ManyToOne(targetEntity="Exactitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exactitudid", referencedColumnName="id")
     * })
     */
    private $exactitudid;

    /**
     * @var \Equipo
     *
     * @ORM\ManyToOne(targetEntity="Equipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipoid", referencedColumnName="id")
     * })
     */
    private $equipoid;



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
     * @return Instrumento
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
     * @return Instrumento
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
     * Set rango
     *
     * @param string $rango
     * @return Instrumento
     */
    public function setRango($rango)
    {
        $this->rango = $rango;

        return $this;
    }

    /**
     * Get rango
     *
     * @return string 
     */
    public function getRango()
    {
        return $this->rango;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Instrumento
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set situacionid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Situacion $situacionid
     * @return Instrumento
     */
    public function setSituacionid(\Sistema\InstrumentacionBundle\Entity\Situacion $situacionid = null)
    {
        $this->situacionid = $situacionid;

        return $this;
    }

    /**
     * Get situacionid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Situacion 
     */
    public function getSituacionid()
    {
        return $this->situacionid;
    }

    /**
     * Set magnitudid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Magnitud $magnitudid
     * @return Instrumento
     */
    public function setMagnitudid(\Sistema\InstrumentacionBundle\Entity\Magnitud $magnitudid = null)
    {
        $this->magnitudid = $magnitudid;

        return $this;
    }

    /**
     * Get magnitudid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Magnitud 
     */
    public function getMagnitudid()
    {
        return $this->magnitudid;
    }

    /**
     * Set areaid
     *
     * @param \Sistema\DocumentacionBundle\Entity\Area $areaid
     * @return Instrumento
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
     * Set exactitudid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Exactitud $exactitudid
     * @return Instrumento
     */
    public function setExactitudid(\Sistema\InstrumentacionBundle\Entity\Exactitud $exactitudid = null)
    {
        $this->exactitudid = $exactitudid;

        return $this;
    }

    /**
     * Get exactitudid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Exactitud 
     */
    public function getExactitudid()
    {
        return $this->exactitudid;
    }

    /**
     * Set equipoid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Equipo $equipoid
     * @return Instrumento
     */
    public function setEquipoid(\Sistema\InstrumentacionBundle\Entity\Equipo $equipoid = null)
    {
        $this->equipoid = $equipoid;

        return $this;
    }

    /**
     * Get equipoid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Equipo 
     */
    public function getEquipoid()
    {
        return $this->equipoid;
    }
    public function __toString() {
        return $this->getNombre();
    }
    
      public function __construct() {
          $this->nombre= new ArrayCollection();
      }
}
