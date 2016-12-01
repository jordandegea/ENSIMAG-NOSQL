<?php
namespace Entity;


class Ecole{
    private $nom;

    public function __construct($nom){
    	$this->nom = $nom;
    }

    /**
     *
     */
    public function export(){
        return "";
    }
}