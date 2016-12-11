<?php
namespace Entity;

use Entity\Link\AppartientListeEcole;
use Entity\Link\Organise;
use Entity\Link\Propose;

class Liste{
    public $nom;
    public $type;

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

    /**
     *
     */
    public function export(){
        return "CREATE($this->nom:Liste {nom: '$this->nom', type: '$this->type'})\n";
    }

    public function exportRelations() {
	$export = "";
	foreach ($this->organiseEvents as $organise) {
		$export .= $organise->export($this);
	}
	foreach ($this->proposeSOS as $propose) {
		$export .= $propose->export($this);
	}
	$export .= $this->appartientEcole->export($this);

	return $export;
    }
}
