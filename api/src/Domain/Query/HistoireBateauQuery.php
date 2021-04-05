<?php


namespace App\Domain\Query;


class HistoireBateauQuery
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