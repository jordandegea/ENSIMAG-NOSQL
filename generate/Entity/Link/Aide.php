<?php
namespace Entity\Link;

use Entity\Liste;
use Entity\Sponsor;

class Aide{
    public $montant;

    public $sponsor;

    public function __construct(Liste $sponsor, $montant){
        $this->montant = $montant;
        $this->sponsor = $sponsor;
    }

    /**
     *
     */
    public function export(){
        return "";
    }
}