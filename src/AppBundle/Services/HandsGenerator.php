<?php

// src/AppBundle/Services/HandsGenerator.php

namespace AppBundle\Services;


class HandsGenerator
{
    private $deck = array();
    private $distributedCards;
    private $northPlayerCards;
    private $eastPlayerCards;
    private $southPlayerCards;
    private $westPlayerCards;

    public function __construct($deck)
    {
        $this->deck = $deck;

        echo "<pre>";
        var_dump($this->deck);
        echo "</pre>";
    }

    public function distributeCards()
    {

    }

    /**
     * @return mixed
     */
    public function getNorthPlayerCards()
    {
        return $this->northPlayerCards;
    }

    /**
     * @return mixed
     */
    public function getEastPlayerCards()
    {
        return $this->eastPlayerCards;
    }

    /**
     * @return mixed
     */
    public function getSouthPlayerCards()
    {
        return $this->southPlayerCards;
    }

    /**
     * @return mixed
     */
    public function getWestPlayerCards()
    {
        return $this->westPlayerCards;
    }

}