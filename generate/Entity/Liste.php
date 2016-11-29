<?php
namespace Entity;

use Entity\Link\AppartientListeEcole;
use Entity\Link\Organise;
use Entity\Link\Propose;

class Liste{
    private $nom;
    private $type;

    public $appartientEcole;
    public $organiseEvents = array();
    public $proposeSOS = array();

    public function __construct($nom, $type){
    	$this->nom = $nom;
    	$this->type = $type;
    }

    public function setAppartientEcole(Ecole $ecole){
        $this->appartientEcole = new AppartientListeEcole($ecole);
    }

    public function addOrganiseEvent(Event $event){
        $this->organiseEvents[] = new Organise($event);
    }

    public function addProposeSOS(SOS $sos){
        $this->proposeSOS[] = new Propose($sos);
    }
}