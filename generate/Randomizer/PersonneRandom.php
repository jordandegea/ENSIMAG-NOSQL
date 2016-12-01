<?php
namespace Randomizer;

/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 21:54
 */
class PersonneRandom
{
    public function getPrenom($rand)
    {
        return "Prenom " . $rand % 1000;
    }

    public function getNom($rand)
    {
        return "Nom " . $rand % 1000;
    }

    public function getAnnee($rand)
    {
        return $rand % 3 + 2016;
    }

    public function getSexe($rand)
    {
        $chance = $rand % 100;
        if ($chance < 20) {
            return "F";
        } else {
            return "M";
        }
    }

    public function generateOne($rand)
    {
        return new \Entity\Personne(
            $this->getPrenom($rand),
            $this->getNom($rand),
            $this->getAnnee($rand),
            $this->getSexe($rand)
        );
    }

}