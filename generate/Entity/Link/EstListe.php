<?php
namespace Entity\Link;

use Entity\Liste;

class EstListe{
    public $role;
    public $liste;

    public function __construct(Liste $liste, $role)
    {
        $this->role = $role;
        $this->liste = $liste;
    }
}
