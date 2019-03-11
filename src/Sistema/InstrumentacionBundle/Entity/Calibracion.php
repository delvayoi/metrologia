<?php

namespace Sistema\InstrumentacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calibracion
 *
 * @ORM\Table(name="calibracion", indexes={@ORM\Index(name="IDX_310CDB359F88B928", columns={"servicioporid"}), @ORM\Index(name="IDX_310CDB35BDDBF199", columns={"frecuenciacalid"}), @ORM\Index(name="IDX_310CDB35289AF80C", columns={"instrumentoid"})})
 * @ORM\Entity
 */
class Calibracion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaultima", type="date", nullable=false)
     */
    private $fechaultima;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechareal", type="date", nullable=false)
     */
    private $fechareal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaproxima", type="date", nullable=false)
     */
    private $fechaproxima;

    /**
     * @var \Instrumento
     *
     * @ORM\ManyToOne(targetEntity="Instrumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instrumentoid", referencedColumnName="id")
     * })
     */
    private $instrumentoid;

    /**
     * @var \Serviciopor
     *
     * @ORM\ManyToOne(targetEntity="Serviciopor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="servicioporid", referencedColumnName="id")
     * })
     */
    private $servicioporid;

    /**
     * @var \Frecuenciacal
     *
     * @ORM\ManyToOne(targetEntity="Frecuenciacal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="frecuenciacalid", referencedColumnName="id")
     * })
     */
    private $frecuenciacalid;



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
     * Set fechaultima
     *
     * @param \DateTime $fechaultima
     * @return Calibracion
     */
    public function setFechaultima($fechaultima)
    {
        $this->fechaultima = $fechaultima;

        return $this;
    }

    /**
     * Get fechaultima
     *
     * @return \DateTime 
     */
    public function getFechaultima()
    {
        return $this->fechaultima;
    }

    /**
     * Set fechareal
     *
     * @param \DateTime $fechareal
     * @return Calibracion
     */
    public function setFechareal($fechareal)
    {
        $this->fechareal = $fechareal;

        return $this;
    }

    /**
     * Get fechareal
     *
     * @return \DateTime 
     */
    public function getFechareal()
    {
        return $this->fechareal;
    }

    /**
     * Set fechaproxima
     *
     * @param \DateTime $fechaproxima
     * @return Calibracion
     */
    public function setFechaproxima($fechaproxima)
    {
        $this->fechaproxima = $fechaproxima;

        return $this;
    }

    /**
     * Get fechaproxima
     *
     * @return \DateTime 
     */
    public function getFechaproxima()
    {
        return $this->fechaproxima;
    }

    /**
     * Set instrumentoid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Instrumento $instrumentoid
     * @return Calibracion
     */
    public function setInstrumentoid(\Sistema\InstrumentacionBundle\Entity\Instrumento $instrumentoid = null)
    {
        $this->instrumentoid = $instrumentoid;

        return $this;
    }

    /**
     * Get instrumentoid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Instrumento 
     */
    public function getInstrumentoid()
    {
        return $this->instrumentoid;
    }

    /**
     * Set servicioporid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Serviciopor $servicioporid
     * @return Calibracion
     */
    public function setServicioporid(\Sistema\InstrumentacionBundle\Entity\Serviciopor $servicioporid = null)
    {
        $this->servicioporid = $servicioporid;

        return $this;
    }

    /**
     * Get servicioporid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Serviciopor 
     */
    public function getServicioporid()
    {
        return $this->servicioporid;
    }

    /**
     * Set frecuenciacalid
     *
     * @param \Sistema\InstrumentacionBundle\Entity\Frecuenciacal $frecuenciacalid
     * @return Calibracion
     */
    public function setFrecuenciacalid(\Sistema\InstrumentacionBundle\Entity\Frecuenciacal $frecuenciacalid = null)
    {
        $this->frecuenciacalid = $frecuenciacalid;

        return $this;
    }

    /**
     * Get frecuenciacalid
     *
     * @return \Sistema\InstrumentacionBundle\Entity\Frecuenciacal 
     */
    public function getFrecuenciacalid()
    {
        return $this->frecuenciacalid;
    }

}
