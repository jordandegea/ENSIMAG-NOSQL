<?php

define("NB_ECOLES", 1);
define("NB_LISTES", 2);
define("NB_EVENTS_PAR_LISTE", 4);
define("NB_SPONSORS", 12);
define("NB_SOS_PAR_LISTE", 7);
define("NB_PERSONNES", 600);
define("NB_PERSONNE_PAR_LISTE", 20);

define("NB_COUPLES", 50);

foreach (glob("Entity/*.php") as $filename)
{
    require $filename;
}
foreach (glob("Entity/Link/*.php") as $filename)
{
    require $filename;
}

foreach (glob("Randomizer/*.php") as $filename)
{
    require $filename;
}

use Entity\Ecole;
use Entity\Event;
use Entity\Liste;
use Entity\Personne;
use Entity\SOS;
use Entity\Sponsor;
use Randomizer\PersonneRandom;
use Randomizer\EcoleRandom;
use Randomizer\EventRandom;
use Randomizer\ListeRandom;
use Randomizer\SOSRandom;
use Randomizer\SponsorRandom;

$date = new DateTime();
srand($date->getTimestamp());

$ecoleRandom = new EcoleRandom();
$eventRandom = new EventRandom();
$listeRandom = new ListeRandom();
$personneRandom = new PersonneRandom();
$SOSRandom = new SOSRandom();
$sponsorRandom= new SponsorRandom();


$ecoles = array();
$events = array();
$listes = array();
$personnes = array();
$SOS = array();
$sponsors = array();

/* ******************************
 *
 * Generation de tous les objets
 *
 ****************************** */

for ($i = 0 ; $i < NB_PERSONNES ; $i++){
    array_push(
        $personnes,
        $personneRandom->generateOne(rand()));
}
for ($i = 0 ; $i < NB_LISTES ; $i++){
    $type = ($i%2 == 0)?"sport":"eleve";
    array_push(
        $listes,
        $listeRandom->generateOne(rand(),$type));
}
for ($i = 0 ; $i < NB_ECOLES ; $i++){
    array_push(
        $ecoles,
        $ecoleRandom->generateOne(rand()));
}
for ($i = 0 ; $i < NB_EVENTS_PAR_LISTE*NB_LISTES ; $i++){
    array_push(
        $events,
        $eventRandom->generateOne(rand()));
}
for ($i = 0 ; $i < NB_SOS_PAR_LISTE*NB_LISTES ; $i++){
    array_push(
        $SOS,
        $SOSRandom->generateOne(rand()));
}
for ($i = 0 ; $i < NB_SPONSORS ; $i++){
    array_push(
        $sponsors,
        $sponsorRandom->generateOne(rand()));
}

/* *************************
 *
 * Generation des relations
 *
 * ************************* */

/* @var $personne1 Personne */
/* @var $personne2 Personne */

/* @var $personne Personne */
/* @var $liste Liste */
/* @var $event Event */
/* @var $ecole Ecole */
/* @var $sponsor Sponsor */
/* @var $SOS_ob SOS */

// Linkage Couple
for ($i = 0 ; $i < NB_COUPLES ; $i++){
    $personne_id1 = rand()%NB_PERSONNES;
    $personne_id2 = rand()%NB_PERSONNES;
    $personne1 = $personnes[$personne_id1];
    $personne2 = $personnes[$personne_id2];
    $personne1->setCouple($personne2);
    $personne2->setCouple($personne1);
}


// Linkage Personnes Ecoles
for ($i = 0 ; $i < NB_PERSONNES; $i++){
    $ecole_id = rand()%NB_ECOLES;
    $ecole = $ecoles[$ecole_id];
    $personne = $personnes[$i];
    $personne->setAppartientEcole($ecole);
}

// Linkage Liste Ecole
for ($i = 0 ; $i < NB_LISTES; $i++){
    $ecole_id = rand()%NB_ECOLES;
    $ecole = $ecoles[$ecole_id];
    $liste = $listes[$i];
    $liste->setAppartientEcole($ecole);
}

// Linkage Personne Liste
for ($i = 0 ; $i < NB_LISTES; $i++){
    $liste = $listes[$i];
    for ($j = 0 ; $j < NB_PERSONNE_PAR_LISTE; $j++) {
        $personne = $personnes[$j];
        $personne->addAppartientListe($liste, "role");
    }
}

//Linkage Liste SOS
for ($i = 0 ; $i < NB_LISTES; $i++){
    $liste = $listes[$i];
    for ($j = 0 ; $j < NB_SOS_PAR_LISTE; $j++) {
        $SOS_ob = $SOS[$i*NB_LISTES+$j];
        $liste->addProposeSOS($SOS_ob);
    }
}

//Linkage Liste Events
for ($i = 0 ; $i < NB_LISTES; $i++){
    $liste = $listes[$i];
    for ($j = 0 ; $j < NB_EVENTS_PAR_LISTE; $j++) {
        $event = $events[$i*NB_LISTES+$j];
        $liste->addOrganiseEvent($event);
    }
}
//Linkage Liste Sponsor
for ($i = 0 ; $i < NB_SPONSORS; $i++){
    $sponsor = $sponsors[$i];
    $liste_id = rand()%NB_LISTES;
    $liste = $listes[$liste_id];
    $sponsor->setAide($liste, rand()%2000+1000);
}

// Linkage participe event
for ($i = 0 ; $i < NB_PERSONNES; $i++) {
    $personne = $personnes[$i];
    $motivation = rand()%10;
    for ($j = 0; $j < NB_EVENTS_PAR_LISTE * NB_LISTES; $j++) {
        $event = $events[$j];
        $motivation_event = rand()%10;
        if ($motivation > $motivation_event){
            $personne->addParticipeEvent($event, $motivation_event*$motivation);
        }
    }
}

// Linkage Personne SOS
for ($i = 0 ; $i < NB_PERSONNES; $i++) {
    $personne = $personnes[$i];
    for ($j = 0; $j < NB_SOS_PAR_LISTE * NB_LISTES; $j++) {
        $SOS_ob = $SOS[$j];
        $nombre = rand()%10;
        $personne->addDemandeSOS($SOS_ob, $nombre);
    }
}


/* ***************************
 *
 *  Exporter données
 *
 *************************** */

for ($i = 0 ; $i < NB_PERSONNES ; $i++){
    $personne = $personnes[$i];
    print($personne->export());
}
for ($i = 0 ; $i < NB_LISTES ; $i++){
    $liste = $listes[$i];
    print($liste->export());
}
for ($i = 0 ; $i < NB_ECOLES ; $i++){
    $ecole = $ecoles[$i];
    print($ecole->export());
}
for ($i = 0 ; $i < NB_EVENTS_PAR_LISTE*NB_LISTES ; $i++){
    $event = $events[$i];
    print($event->export());
}
for ($i = 0 ; $i < NB_SOS_PAR_LISTE*NB_LISTES ; $i++){
    $sos = $SOS[$i];
    print($sos->export());
}
for ($i = 0 ; $i < NB_SPONSORS ; $i++){
    $sponsor = $sponsors[$i];
    print($sponsor->export());
}


for ($i = 0 ; $i < NB_PERSONNES ; $i++){
    $personne = $personnes[$i];
    if ( $personne->enCouple != null){
        $personne->enCouple->export();
    }
    $personne->appartientEcole->export();

    for ($j = 0 ; $j < count($personne->participeEvents) ; $j++){
        $personne->participeEvents[$j]->export();
    }
    for ($j = 0 ; $j < count($personne->aDemandeSOS) ; $j++){
        $personne->aDemandeSOS[$j]->export();
    }
    for ($j = 0 ; $j < count($personne->appartientListe) ; $j++){
        $personne->appartientListe[$j]->export();
    }
}


for ($i = 0 ; $i < NB_LISTES ; $i++) {
    $liste = $listes[$i];

    $liste->appartientEcole->export();

    for ( $j = 0 ; $j < count($liste->organiseEvents) ; $j++){
        $liste->organiseEvents[$j]->export();
    }
    for ( $j = 0 ; $j < count($liste->proposeSOS) ; $j++){
        $liste->proposeSOS[$j]->export();
    }
}


for ($i = 0 ; $i < NB_SPONSORS ; $i++){
    $sponsor = $sponsors[$i];
    $sponsor->aide->export();
}









