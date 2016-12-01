<?php
namespace Entity\Link;

use Entity\Liste;
use Entity\Sponsor;

class Aide{
    public $montant;

    public $liste;

    public function __construct(Liste $liste, $montant){
        $this->montant = $montant;
        $this->liste = $liste;
    }

    /**
     *
     */
    public function export($sponsor){
        return "CREATE ($sponsor->nom)-[:AIDE {montant:$this->montant}]->({$this->liste->nom})\n";
    }
}
