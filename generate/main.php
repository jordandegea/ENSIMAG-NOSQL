<?php

define("NB_ECOLES", 1);
define("NB_LISTES", 2);
define("NB_EVENTS", NB_LISTES*4);
define("NB_SPONSORS", 20);
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

// Generation de tous les objets

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
for ($i = 0 ; $i < NB_EVENTS ; $i++){
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


/* @var $personne1 Personne */
/* @var $personne2 Personne */

/* @var $personne Personne */
/* @var $ecole Ecole */
/* @var $liste Liste */
/* @var $ecole Ecole */

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
    $personne = $personnes[$i];
    $personne->setAppartientEcole($ecole);
}

// Linkage Personne Liste
for ($i = 0 ; $i < NB_LISTES; $i++){
    $liste = $listes[$i];
    for ($j = 0 ; $j < NB_PERSONNE_PAR_LISTE; $j++) {
        $personne = $personnes[$j];
        $personne->addAppartientListe($liste);
    }
}

//Linkage Liste SOS






