<?php

// src/AppBundle/Services/DeckGenerator.php

namespace AppBundle\Services;
use Symfony\Component\Yaml\Yaml;

class DeckGenerator implements \Iterator
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

    /**
     * Return the current element
     * @return mixed Can return any type.
     */
    public function current()
    {
        $deck = current($this->deck);
        echo "current: $deck\n";
        return $deck;
    }

    /**
     * Move forward to next element
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $deck = next($this->deck);
        echo "next: $deck\n";
        return $deck;
    }

    /**
     * Return the key of the current element
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        $deck = key($this->deck);
        echo "key: $deck\n";
        return $deck;
    }

    /**
     * Checks if current position is valid
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        $key = key($this->deck);
        $deck = ($key !== NULL && $key !== FALSE);
        echo "valid: $deck\n";
        return $deck;
    }

    /**
     * Rewind the Iterator to the first element
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        echo "rewinding\n";
        reset($this->deck);
    }
}