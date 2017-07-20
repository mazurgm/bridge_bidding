<?php

// src/AppBundle/Entity/Panstwo.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panstwo
 *
 * @ORM\Table(name="Panstwa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PanstwoRepository")
 */

class Panstwo
{

    /**
     * @ORM\ManyToOne(targetEntity="Kontynent", inversedBy="panstwa")
     * @ORM\JoinColumn(name="kontynent_id", referencedColumnName="id",
    nullable=false)
     */
    protected $kontynent;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="nazwa", type="string", length=255, unique=true)
     */
    protected $nazwa;

    /**
     * Set kontynent
     *
     * @param \AppBundle\Entity\Kontynent $kontynent
     *
     * @return Panstwo
     */
    public function setKontynent(\AppBundle\Entity\Kontynent $kontynent = null)
    {
        $this->kontynent = $kontynent;

        return $this;
    }

    /**
     * Get kontynent
     *
     * @return \AppBundle\Entity\Kontynent
     */
    public function getKontynent()
    {
        return $this->kontynent;
    }

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
     * Set nazwa
     *
     * @param string $nazwa
     *
     * @return Panstwo
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }
}
