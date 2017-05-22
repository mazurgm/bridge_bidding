<?php

// src/AppBundle/Classes/Cards.php

namespace AppBundle\Classes;
use Symfony\Component\Yaml\Yaml;


class Cards
{
    private $deck;
    private $distributedCards;
    private $northPlayerCards;
    private $eastPlayerCards;
    private $southPlayerCards;
    private $westPlayerCards;


    public function __construct()
    {
       $this->deck = array(

           array("Spade", 'A', 13, 14, 'images/ace_of_spades2.png'),
           array("Spade", 'K', 12, 13, 'images/king_of_spades2.png'),
           array("Spade", 'Q', 11, 12, 'images/queen_of_spades2.png'),
           array("Spade", 'J', 10, 11, 'images/jack_of_spades2.png'),
           array("Spade", '10' , 9, 10, 'images/10_of_spades.png'),
           array("Spade", '9' , 8, 9, 'images/9_of_spades.png'),
           array("Spade", '8' , 7, 8, 'images/8_of_spades.png'),
           array("Spade", '7' , 6, 7, 'images/7_of_spades.png'),
           array("Spade", '6' , 5, 6, 'images/6_of_spades.png'),
           array("Spade", '5' , 4, 5, 'images/5_of_spades.png'),
           array("Spade", '4' , 3, 4, 'images/4_of_spades.png'),
           array("Spade", '3' , 2, 3, 'images/3_of_spades.png'),
           array("Spade", '2' , 1, 2, 'images/2_of_spades.png'),

           array("Heart", 'A', 13, 14, 'images/ace_of_hearts2.png'),
           array("Heart", 'K', 12, 13, 'images/king_of_hearts2.png'),
           array("Heart", 'Q', 11, 12, 'images/queen_of_hearts2.png'),
           array("Heart", 'J', 10, 11, 'images/jack_of_hearts2.png'),
           array("Heart", '10' , 9, 10, 'images/10_of_hearts.png'),
           array("Heart", '9' , 8, 9, 'images/9_of_hearts.png'),
           array("Heart", '8' , 7, 8, 'images/8_of_hearts.png'),
           array("Heart", '7' , 6, 7, 'images/7_of_hearts.png'),
           array("Heart", '6' , 5, 6, 'images/6_of_hearts.png'),
           array("Heart", '5' , 4, 5, 'images/5_of_hearts.png'),
           array("Heart", '4' , 3, 4, 'images/4_of_hearts.png'),
           array("Heart", '3' , 2, 3, 'images/3_of_hearts.png'),
           array("Heart", '2' , 1, 2, 'images/2_of_hearts.png'),


           array("Diamond", 'A', 13, 14, 'images/ace_of_diamonds2.png'),
           array("Diamond", 'K', 12, 13, 'images/king_of_diamonds2.png'),
           array("Diamond", 'Q', 11, 12, 'images/queen_of_diamonds2.png'),
           array("Diamond", 'J', 10, 11, 'images/jack_of_diamonds2.png'),
           array("Diamond", '10' , 9, 10, 'images/10_of_diamonds.png'),
           array("Diamond", '9' , 8, 9, 'images/9_of_diamonds.png'),
           array("Diamond", '8' , 7, 8, 'images/8_of_diamonds.png'),
           array("Diamond", '7' , 6, 7, 'images/7_of_diamonds.png'),
           array("Diamond", '6' , 5, 6, 'images/6_of_diamonds.png'),
           array("Diamond", '5' , 4, 5, 'images/5_of_diamonds.png'),
           array("Diamond", '4' , 3, 4, 'images/4_of_diamonds.png'),
           array("Diamond", '3' , 2, 3, 'images/3_of_diamonds.png'),
           array("Diamond", '2' , 1, 2, 'images/2_of_diamonds.png'),

           array("Club", 'A', 13, 14, 'images/ace_of_clubs2.png'),
           array("Club", 'K', 12, 13, 'images/king_of_clubs2.png'),
           array("Club", 'Q', 11, 12, 'images/queen_of_clubs2.png'),
           array("Club", 'J', 10, 11, 'images/jack_of_clubs2.png'),
           array("Club", '10' , 9, 10, 'images/10_of_clubs.png'),
           array("Club", '9' , 8, 9, 'images/9_of_clubs.png'),
           array("Club", '8' , 7, 8, 'images/8_of_clubs.png'),
           array("Club", '7' , 6, 7, 'images/7_of_clubs.png'),
           array("Club", '6' , 5, 6, 'images/6_of_clubs.png'),
           array("Club", '5' , 4, 5, 'images/5_of_clubs.png'),
           array("Club", '4' , 3, 4, 'images/4_of_clubs.png'),
           array("Club", '3' , 2, 3, 'images/3_of_clubs.png'),
           array("Club", '2' , 1, 2, 'images/2_of_clubs.png'),

       );

    }

    /**
     * @return array
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * @return array
     */
    public function shuffleDeck()
    {
        shuffle($this->deck);
    }

    /**
     * @return array
     */
    public function distributeCards()
    {
        $this->distributedCards = array_chunk($this->deck,13);

        $this->northPlayerCards = $this->sortDistributedCards($this->distributedCards[0]);
        $this->eastPlayerCards = $this->sortDistributedCards($this->distributedCards[1]);
        $this->southPlayerCards = $this->sortDistributedCards($this->distributedCards[2]);
        $this->westPlayerCards = $this->sortDistributedCards($this->distributedCards[3]);
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

    /**
     * @return array
     */
    public function sortDistributedCards($hand)
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