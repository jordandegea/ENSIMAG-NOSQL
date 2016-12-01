<?php
namespace Entity\Link;

use Entity\Event;

class Organise{
    public $event;

    public function  __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     *
     */
    public function export($liste){
	    return "CREATE ($liste->nom)-[:ORGANISE]->({$this->event->nom})\n";
    }
}
