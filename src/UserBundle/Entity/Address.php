<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 */
class Address
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $delegacion;

    /**
     * @var string
     */
    private $numero;

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
     * __toString
     *
     * @return string String representation of this class
     */
    public function __toString()
    {
        return "{$this->calle} {$this->numero}, {$this->colonia}, {$this->delegacion}";
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Address
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     * @return Address
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set delegacion
     *
     * @param string $delegacion
     * @return Address
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return string
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Address
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
