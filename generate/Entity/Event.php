<?php
namespace Entity;

class Event{
    private $nom;
    private $type;

    public function __construct($nom, $type){
    	$this->nom = $nom;
    	$this->type = $type;
    }

}