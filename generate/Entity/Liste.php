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

    public function AppartientEcole(Ecole $ecole){
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
        return "CREATE($this->nom:Liste {nom: $this->nom, type: $this->type})";
    }

    public function exportRelations() {
	$export = "";
	foreach ($this->organiseEvent as $organise) {
		$export .= $organize->export($this);
		$export .= '\n';
	}
	foreach ($this->proposeSOS as $propose) {
		$export .= $propose->export($this);
		$export .= '\n';
	}
	$export .= $this->appartientEcole->export($this);

	return $export;
    }
}
