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
	private $i = 0;
    public function getNom($rand){
        return "Liste".$this->i++;
    }

    public function generateOne($rand, $type){
        return new \Entity\Liste($this->getNom($rand), $type);
    }
}
