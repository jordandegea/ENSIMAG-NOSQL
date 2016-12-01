<?php
namespace Entity;

class Event{
    private $nom;
    private $type;
    public $prix;
    public $cout;

    public function __construct($nom, $type, $prix, $cout){
    	$this->nom = $nom;
    	$this->type = $type;
        $this->prix = $prix;
        $this->cout = $cout;
    }

}