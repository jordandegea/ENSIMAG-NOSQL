<?php
namespace Entity\Link;

use Entity\Event;

class Participe{
    public $appreciation;
    public $event;

    public function __construct(Event $event, $appreciation)
    {
        $this->appreciation = $appreciation;
        $this->event = $event;
    }
}