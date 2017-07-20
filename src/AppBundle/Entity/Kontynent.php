<?php

// src/AppBundle/Entity/Kontynent.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kontynent
 *
 * @ORM\Table(name="Kontynenty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KontynentRepository")
 */

class Kontynent
{

    /**
     * @ORM\OneToMany(targetEntity="Panstwo", mappedBy="kontynent")
     */
    protected $panstwa;

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
     * Constructor
     */
    public function __construct()
    {
        $this->panstwa = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add panstwa
     *
     * @param \AppBundle\Entity\Panstwo $panstwa
     *
     * @return Kontynent
     */
    public function addPanstwa(\AppBundle\Entity\Panstwo $panstwa)
    {
        $this->panstwa[] = $panstwa;

        return $this;
    }

    /**
     * Remove panstwa
     *
     * @param \AppBundle\Entity\Panstwo $panstwa
     */
    public function removePanstwa(\AppBundle\Entity\Panstwo $panstwa)
    {
        $this->panstwa->removeElement($panstwa);
    }

    /**
     * Get panstwa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPanstwa()
    {
        return $this->panstwa;
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
     * @return Kontynent
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
