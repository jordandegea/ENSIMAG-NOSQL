<?php
namespace Entity;

class Event{
    public $nom;
    public $type;
    public $prix;
    public $cout;

    public function __construct($nom, $type, $prix, $cout){
    	$this->nom = $nom;
    	$this->type = $type;
        $this->prix = $prix;
        $this->cout = $cout;
    }

    /**
     *
     */
    public function export(){
        return "CREATE($this->nom:Evenement {nom: '$this->nom'})\n";
    }

}
