<?php
namespace Framework\Interfaces;

interface ControllerInterface{
    public function index();
    public function submit();
    public function update($id);
    public function delete($id);
}