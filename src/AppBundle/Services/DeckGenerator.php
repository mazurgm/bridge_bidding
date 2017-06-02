<?php

// src/AppBundle/Services/DeckGenerator.php

namespace AppBundle\Services;
use Symfony\Component\Yaml\Yaml;

class DeckGenerator implements \Iterator
{
    private $position = 0;
    private $deck = array();

    public function __construct($list_of_cards_link)
    {
        $this->position = 0;
        $cardsArray = Yaml::parse(file_get_contents($list_of_cards_link));

        foreach ($cardsArray as $card)
        {
            $this->deck[] = new Card($card[0],$card[1],$card[2],$card[3],$card[4]);
        }
    }

    public function shuffleDeck()
    {
        return shuffle($this->deck);
    }

    public function rewind() {
        //var_dump(__METHOD__);
        $this->position = 0;
    }

    public function current() {
        //var_dump(__METHOD__);
        return $this->deck[$this->position];
    }

    public function key() {
        //var_dump(__METHOD__);
        return $this->position;
    }

    public function next() {
       //var_dump(__METHOD__);
        ++$this->position;
    }

    public function valid() {
        //var_dump(__METHOD__);
        return isset($this->deck[$this->position]);
    }

}