<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * People
 */
class People
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apePaterno;

    /**
     * @var string
     */
    private $apeMaterno;

    /**
     * @var int
     */
    private $edad;

    /**
     * One Person has One Address.
     * @ORM\OneToOne(targetEntity="Address", inversedBy="people")
     * @ORM\JoinColumn(name="people_id", referencedColumnName="id")
     */
    private $address;

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
      return "{$this->apePaterno} {$this->apeMaterno}, {$this->nombre} ({$this->edad})";
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return People
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
     * Set apePaterno
     *
     * @param string $apePaterno
     * @return People
     */
    public function setApePaterno($apePaterno)
    {
        $this->apePaterno = $apePaterno;

        return $this;
    }

    /**
     * Get apePaterno
     *
     * @return string
     */
    public function getApePaterno()
    {
        return $this->apePaterno;
    }

    /**
     * Set apeMaterno
     *
     * @param string $apeMaterno
     * @return People
     */
    public function setApeMaterno($apeMaterno)
    {
        $this->apeMaterno = $apeMaterno;

        return $this;
    }

    /**
     * Get apeMaterno
     *
     * @return string
     */
    public function getApeMaterno()
    {
        return $this->apeMaterno;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return People
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }
    /**
     * Set address
     *
     * @param string $address
     * @return People
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
