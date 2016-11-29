<?php
namespace Entity;

use Entity\Link\ADemande;
use Entity\Link\AppartientPersonneEcole;
use Entity\Link\EnCouple;
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

    public function addDemandeSOS(SOS $sos, Liste $list, $nombre){
        $this->aDemandeSOS[] = new ADemande($sos, $liste, $nombre);
    }

    public function setAppartientEcole(Ecole $ecole){
        $this->appartientEcole = new AppartientPersonneEcole($ecole);
    }

}