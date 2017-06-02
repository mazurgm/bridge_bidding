<?php

// src/AppBundle/Services/Card.php

namespace AppBundle\Services;


class Card
{
    public $color;
    public $type;
    public $value1;
    public $value2;
    public $link;

    public function __construct($color, $type, $value1, $value2, $link)
    {
        $this->color = $color;
        $this->type = $type;
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->link = $link;
    }

}