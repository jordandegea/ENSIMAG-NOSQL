<?php
namespace Randomizer;

use Entity\Event;
/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 22:27
 */
class EcoleRandom
{
    public function getNom($rand){
        return "Ecole ".$rand%1000;
    }

    public function generateOne($rand){
        return new \Entity\Ecole($this->getNom($rand));
    }
}