<?php

// src/AppBundle/Services/DeckGenerator.php

namespace AppBundle\Services;
use Symfony\Component\Yaml\Yaml;

class DeckGenerator
{
    private $deck = array();

    public function __construct($link_to_the_list_of_cards)
    {
        $cardsArray = Yaml::parse(file_get_contents($link_to_the_list_of_cards));

        foreach ($cardsArray as $card)
        {
            $this->deck[] = new Card($card[0],$card[1],$card[2],$card[3],$card[4]);
        }
    }

    public function shuffleDeck()
    {
        return shuffle($this->deck);
    }

}