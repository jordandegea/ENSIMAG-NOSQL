<?php
namespace Entity\Link;

use Entity\SOS;

class ADemande{
    public $nombre;

    public $SOS;

    public function __construct(SOS $SOS, $nombre){
        $this->nombre = $nombre;
        $this->SOS = $SOS;
    }
}