<?php


namespace App\Domain\Query;
use App\Domain\InformationsBateaux;

class InformationBateauxHandler
{

    private $informationBateau;

    public function __construct(InformationsBateaux $informationBateau)
    {
        $this->informationBateau= $informationBateau;
    }
    public function handle(InformationsBateauxQuery $query)
    {
        return $this->informationBateau->getBateauById($query->getValue());
    }
}