<?php
namespace Entity\Link;

use Entity\Sponsor;

class Aide{
    public $montant;

    public $sponsor;

    public function __construct(Sponsor $sponsor, $montant){
        $this->montant = $montant;
        $this->sponsor = $sponsor;
    }
}