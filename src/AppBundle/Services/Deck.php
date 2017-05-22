<?php

// src/AppBundle/Services/Deck.php

namespace AppBundle\Services;
use Symfony\Component\Yaml\Yaml;


class Deck
{
    private $cardsArray;
    private $card;
    private $deck;

    public function __construct($link_to_the_list_of_cards)
    {
        $this->cardsArray = Yaml::parse(file_get_contents($link_to_the_list_of_cards));
        foreach ($this->cardsArray as $card) {
            var_dump($card);

            echo "<br />";
        }
    }

    private function shuffleDeck()
    {

    }

}