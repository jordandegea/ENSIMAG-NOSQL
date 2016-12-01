<?php

define("NB_ECOLES", 1);
define("NB_LISTES", 2);
define("NB_EVENTS", NB_LISTES*4);
define("NB_SPONSORS", 20);
define("NB_SOS", NB_LISTES*7);
define("NB_PERSONNES", 600);

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
for ($i = 0 ; $i < NB_SOS ; $i++){
    array_push(
        $SOS,
        $SOSRandom->generateOne(rand()));
}
for ($i = 0 ; $i < NB_SPONSORS ; $i++){
    array_push(
        $sponsors,
        $sponsorRandom->generateOne(rand()));
}

