<?php
namespace Entity;

use Entity\Link\ADemande;
use Entity\Link\AppartientPersonneEcole;
use Entity\Link\EnCouple;
use Entity\Link\EstListe;
use Entity\Link\Participe;

class Personne{
    public $nom;
    public $prenom;
    public $annee;
    public $sexe;


    public $participeEvents = array();
    public $enCouple;
    public $aDemandeSOS = array();
    public $appartientEcole;
    public $appartientListe = array();

    public function __construct($nom, $prenom, $annee, $sexe){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->annee = $annee;
        $this->sexe = $sexe;
    }

    public function setCouple(Personne $personne){
        $this->enCouple = new EnCouple($personne);
    }

    public function addParticipeEvent(Event $event, $appreciation){
        $this->participeEvents[] = new Participe($event, $appreciation);
    }

    public function addDemandeSOS(SOS $sos, $nombre){
        $this->aDemandeSOS[] = new ADemande($sos, $nombre);
    }
    public function addAppartientListe(Liste $liste, $role){
        $this->appartientListe[] = new EstListe($liste, $role);
    }

    public function setAppartientEcole(Ecole $ecole){
        $this->appartientEcole = new AppartientPersonneEcole($ecole);
    }

    public function fullName() {
	return $this->prenom . $this->nom;
    }

    /**
     *
     */
    public function export(){
	$nom = $this->fullName();
        return "CREATE($nom:Personne {prenom: '$this->prenom', nom: '$this->nom', annee: $this->annee, sexe: '$this->sexe'})\n";
    }

    public function exportRelations() {
	$export = "";
	foreach ($this->participeEvents as $participe) {
		$export .= $participe->export($this);
	}
	foreach ($this->aDemandeSOS as $demande) {
		$export .= $demande->export($this);
	}
	foreach ($this->appartientListe as $appartient) {
		$export .= $appartient->export($this);
	}
	if (!is_null($this->enCouple))
		$export .= $this->enCouple->export($this);
	$export .= $this->appartientEcole->export($this);

	return $export;
    }
}
