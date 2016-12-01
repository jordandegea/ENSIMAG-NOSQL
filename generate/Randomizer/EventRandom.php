<?php
namespace Randomizer;

/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 22:28
 */
class EventRandom
{
    public function getNom($rand){
        return "Event ".$rand%1000;
    }

    public function getPrix($rand){
        return ( $rand % 1000 ) / 100;
    }
    public function getCout($rand, $max){
        return ( $rand % ($max * 100) ) / 100;
    }

    public function generateOne($rand){
        $type = "";
        $prix = $this->getPrix($rand);
        $cout = $this->getCout($rand, $prix);
        return new \Entity\Event($this->getNom($rand), $type, $prix, $cout);
    }
}