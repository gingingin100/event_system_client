<?php
namespace Framework\Abstracts;

abstract class Controller implements \Framework\Interfaces\ControllerInterface{
    protected $renderer;
    protected $event;
    public function __construct(){
        $this->renderer = new \Framework\Layout\Layout();
        $this->event = new \App\Models\EventModel();
    }

    abstract public function index();
    abstract public function update($id);
    abstract public function submit($id=null);
    abstract public function delete($id);
}