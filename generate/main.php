<?php

foreach (glob("Entity/*.php") as $filename)
{
    require $filename;
}
foreach (glob("Entity/Link/*.php") as $filename)
{
    require $filename;
}


use Entity\Ecole;
use Entity\Event;
use Entity\Liste;
use Entity\Personne;
use Entity\SOS;
use Entity\Sponsor;

echo "lol";

$personne = new Personne("Jordan", "DE GEA", 2016, "M");