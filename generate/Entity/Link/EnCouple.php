<?php
namespace Entity\Link;

use Entity\Personne;

class EnCouple{
    public $personne;

    public function  __construct(Personne $personne)
    {
        $this->personne = $personne;
    }

    /**
     *
     */
    public function export($personne){
	$name1 = $personne->fullName();
	$name2 = $this->personne->fullName();
        return "CREATE ($name1)-[:EN_COUPLE]->($name2)\nCREATE ($name2)-[:EN_COUPLE]->($name1)\n";
    }
}
