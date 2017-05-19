<?php

// src/AppBundle/Classes/Cards2.php

namespace AppBundle\Classes;


class Cards2
{
    private $deck;
    private $distributedCards;

    public function __construct()
    {
        $this->deck = array(
            'A_s', 'K_s', 'Q_s', 'J_s', '10_s', '9_s', '8_s', '7_s', '6_s', '5_s', '4_s', '3_s', '2_s',
            'A_h', 'K_h', 'Q_h', 'J_h', '10_h', '9_h', '8_h', '7_h', '6_h', '5_h', '4_h', '3_h', '2_h',
            'A_d', 'K_d', 'Q_d', 'J_d', '10_d', '9_d', '8_d', '7_d', '6_d', '5_d', '4_d', '3_d', '2_d',
            'A_c', 'K_c', 'Q_c', 'J_c', '10_c', '9_c', '8_c', '7_c', '6_c', '5_c', '4_c', '3_c', '2_c',
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
        return $this->distributedCards = array_chunk($this->deck,13);
    }

}