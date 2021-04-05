<?php


namespace App\Domain;
use App\Entity\Bateau;

interface TemoignageBateaux
{
    public function getTemoignageAudioEtTexteById($value) : iterable;
}