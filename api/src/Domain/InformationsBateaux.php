<?php


namespace App\Domain;
use App\Entity\Bateau;

interface InformationsBateaux
{
    public function getBateauById($value) : iterable;
}