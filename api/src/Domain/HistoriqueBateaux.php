<?php


namespace App\Domain;
use App\Entity\HistoireBateau;

interface HistoriqueBateaux
{
    public function getHistoriqueBateauById($value) : iterable;
}