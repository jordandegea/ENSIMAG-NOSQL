<?php
namespace Entity;

use Entity\Link\Aide;

class Sponsor{
    public $nom;

    public $aide;

    public function __construct($nom){
    	$this->nom = $nom;
    }

    public function setAide(Liste $liste, $montant){
    	$this->aide = new Aide($liste, $montant);
    }

    /**
     *
     */
    public function export(){
        return "CREATE($this->nom:Sponsor {nom:'$this->nom'})\n";
    }

    public function exportRelations() {
	return $this->aide->export($this);
    }
}
