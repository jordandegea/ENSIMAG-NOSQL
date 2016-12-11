<?php
namespace Entity;


class Ecole{
    public $nom;

    public function __construct($nom){
    	$this->nom = $nom;
    }

    /**
     *
     */
    public function export(){
        return "CREATE($this->nom:Ecole {nom:'$this->nom'})\n";
    }
}
