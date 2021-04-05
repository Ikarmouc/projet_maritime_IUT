<?php


namespace App\Domain\Query;
use App\Domain\TemoignageBateaux;

class TemoignageBateauHandler
{

    private $temoignageBateau;

    public function __construct(TemoignageBateaux $temoignageBateau)
    {
        $this->temoignageBateau= $temoignageBateau;
    }
    public function handle(TemoignageBateauQuery $query)
    {
        return $this->temoignageBateau->getTemoignageAudioEtTexteById($query->getValue());
    }
}