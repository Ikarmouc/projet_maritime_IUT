<?php


namespace App\Domain\Query;
use App\Domain\HistoriqueBateaux;

class HistoireBateauHandler
{
    private $temoignageBateau;

    public function __construct(HistoriqueBateaux $temoignageBateau)
    {
        $this->temoignageBateau= $temoignageBateau;
    }
    public function handle(HistoireBateauQuery $query)
    {
        return $this->temoignageBateau->getHistoriqueBateauById($query->getValue());
    }
}