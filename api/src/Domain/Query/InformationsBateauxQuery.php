<?php


namespace App\Domain\Query;


class InformationsBateauxQuery
{
    private $value;
    public function __construct($value)
    {
    $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}