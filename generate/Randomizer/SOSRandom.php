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
	private $i = 0;
    public function getNom($rand){
        return "SOS".$this->i++;
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
