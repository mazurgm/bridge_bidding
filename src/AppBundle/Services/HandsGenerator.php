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

    }

    /**
     * @return mixed
     */
    public function getNorthPlayerCards()
    {
        return $this->splitCards($this->northPlayerCards);
    }

    /**
     * @return mixed
     */
    public function getEastPlayerCards()
    {
        return $this->splitCards($this->eastPlayerCards);
    }

    /**
     * @return mixed
     */
    public function getSouthPlayerCards()
    {
        return $this->splitCards($this->southPlayerCards);
    }

    /**
     * @return mixed
     */
    public function getWestPlayerCards()
    {
        return $this->splitCards($this->westPlayerCards);
    }

    private function splitCards($hand)
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


            switch ($value->color) {
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

        $sorted_hand['Spades'] = $this->sortCards($spades);
        $sorted_hand['Hearts'] = $this->sortCards($hearts);
        $sorted_hand['Diamonds'] = $this->sortCards($diamonds);
        $sorted_hand['Clubs'] = $this->sortCards($clubs);

        return $sorted_hand;

    }

    private function sortCards($cards)
    {
        usort($cards, function($a, $b) {
            return $b->value1 <=> $a->value1;
        });

        return $cards;
    }

}