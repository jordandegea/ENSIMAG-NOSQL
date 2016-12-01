<?php
namespace Randomizer;

/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 22:19
 */
class SOSRandom
{
    public function getNom($rand){
        return "SOS ".$rand%1000;
    }
    public function getPrix($rand){
        return ( $rand % 1000 ) / 100;
    }
    public function getCout($rand, $max){
        return ( $rand % ($max * 100) ) / 100;
    }

    public function generateOne($rand){
        $prix = $this->getPrix($rand);
        $cout = $this->getCout($rand, $prix);
        return new \Entity\SOS($this->getNom($rand), $prix, $cout);
    }
}