<?php
namespace Randomizer;

/**
 * Created by PhpStorm.
 * User: jordandegea
 * Date: 29/11/2016
 * Time: 22:24
 */
class ListeRandom
{
    public function getNom($rand){
        return "Liste ".$rand%1000;
    }

    public function generateOne($rand, $type){
        return new \Entity\Liste($this->getNom($rand), $type);
    }
}