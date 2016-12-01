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
    public function export(){
        return "";
    }
}