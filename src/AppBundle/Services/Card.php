<?php

// src/AppBundle/Services/Card.php

namespace AppBundle\Services;


class Card
{
    private $color;
    private $type;
    private $value1;
    private $value2;
    private $link;

    public function __construct($color, $type, $value1, $value2, $link)
    {
        $this->color = $color;
        $this->type = $type;
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->link = $link;
    }

}