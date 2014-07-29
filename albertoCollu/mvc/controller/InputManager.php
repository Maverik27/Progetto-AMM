<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputManager
 *
 * @author Banana Joe
 */
class InputManager {

    public $input;
    public $setAction;
    public $setPages = array(
        "chisiamo",
        "contattaci",
        "login",
    );

    public function __construct() {
        $this->input = array();
    }

    public function addInputToArray($key, $arrayControl) {
        if (isset($arrayControl[$key])) {
            $value = $arrayControl[$key];
            switch ($key) {
                case "page":
                    $arrayTemp = $this->setPages;
                    break;
                default:
                    $this->input[$key] = $value;
                    return;
            }
            if (isset($arrayTemp) && in_array($value, $arrayTemp)) {
                $this->input[$key] = $value;
            }
        }
    }

    public function getInput($key) {
        if (isset($this->input[$key])) {
            return $this->input[$key];
        } 
        return "";
    }

}
