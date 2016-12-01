<?php

namespace Randomizer;

/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 22:15
 */
class SponsorRandom
{

    public function getNom($rand){
        return "Sponsor ".$rand%1000;
    }

    public function generateOne($rand){
        return new \Entity\Sponsor($this->getNom($rand));
    }
}