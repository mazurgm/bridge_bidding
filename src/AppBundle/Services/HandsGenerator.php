<?php

// src/AppBundle/Services/HandsGenerator.php

namespace AppBundle\Services;


class HandsGenerator implements \Iterator
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
        
    }

    public function distributeCards()
    {
        //echo "<pre>";
       // var_dump($this->deck);
       // echo "</pre>";
        $it = new Test;

        foreach($it as $key => $value) {
            echo "<pre>";
            var_dump($key, $value);
            echo "</pre>";
            echo "\n";
        }

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