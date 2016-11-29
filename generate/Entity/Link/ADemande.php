<?php
namespace Entity\Link;

use Entity\SOS;

class ADemande{
    public $nombre;

    public $liste;
    public $SOS;

    public function __construct(SOS $SOS, Liste $liste, $nombre){
        $this->liste = $liste;
        $this->nombre = $nombre;
        $this->SOS = $SOS;
    }
}