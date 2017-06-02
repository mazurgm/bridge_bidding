<?php

// src/AppBundle/Services/HandsGenerator.php

namespace AppBundle\Services;


class HandsGenerator
{
    private $deck = array();
    private $distributedCards = array();
    private $northPlayerCards = array();
    private $eastPlayerCards = array();
    private $southPlayerCards = array();
    private $westPlayerCards = array();

    public function __construct($deck)
    {
        $this->deck = $deck;
    }

    public function distributeCards()
    {

        foreach($this->deck as $key => $value) {

            switch (true) {
                case $key < 13:
                    array_push($this->northPlayerCards, $value);
                    break;
                case $key < 26:
                    array_push($this->eastPlayerCards, $value);
                    break;
                case $key < 39:
                    array_push($this->southPlayerCards, $value);
                    break;
                case $key < 52:
                    array_push($this->westPlayerCards, $value);
                    break;
            }

        }

        echo "<pre>North";
        var_dump($this->northPlayerCards);
        echo "</pre>";

        echo "<pre>East";
        var_dump($this->eastPlayerCards);
        echo "</pre>";

        echo "<pre>South";
        var_dump($this->southPlayerCards);
        echo "</pre>";

        echo "<pre>West";
        var_dump($this->westPlayerCards);
        echo "</pre>";

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

    private function sortCards($hand)
    {
        $spades = array();
        $hearts = array();
        $diamonds = array();
        $clubs = array();

        $sorted_hand = array(
            "Spades" => array(),
            "Hearts" => array(),
            "Diamonds" => array(),
            "Clubs" => array(),
        );

        foreach ($hand as $value){


            switch ($value[0]) {
                case "Spade":
                    array_push($spades, $value);
                    break;
                case "Heart":
                    array_push($hearts, $value);
                    break;
                case "Diamond":
                    array_push($diamonds, $value);
                    break;
                case "Club":
                    array_push($clubs, $value);
                    break;

            }


        }

        usort($spades, function($a, $b) {
            return $b[2] <=> $a[2];
        });

        usort($hearts, function($a, $b) {
            return $b[2] <=> $a[2];
        });

        usort($diamonds, function($a, $b) {
            return $b[2] <=> $a[2];
        });

        usort($clubs, function($a, $b) {
            return $b[2] <=> $a[2];
        });

        $sorted_hand['Spades'] = $spades;
        $sorted_hand['Hearts'] = $hearts;
        $sorted_hand['Diamonds'] = $diamonds;
        $sorted_hand['Clubs'] = $clubs;


        return $sorted_hand;

    }

}