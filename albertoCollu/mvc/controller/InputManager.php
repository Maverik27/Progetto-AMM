<?php

/**
 * Description of InputManager
 *
 * @author Alberto Collu
 */
class InputManager {

    public $input;
    public $setPages = array(
        "registrati",
        "informazioni",
        "login",
        "desktop",
        "tablet",
        "portatili",
        "profile",
        "ricarica",
        "vetrina",
        "nuovoProdotto",
        "contattaci",
        "desktopGuest",
        "tabletGuest",
        "portatiliGuest",
        "comprato",
    );
    public $setActions = array(
        "login",
        "logout",
        "register",
        "changeData",
        "addCredit",
        "addNew",
    );
    public $validIdentity = array(
        User::IDENTITY_BUYER,
        User::IDENTITY_SELLER,
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
                case "action":
                    $arrayTemp = $this->setActions;
                    break;
                case "identity":
                    $arrayTemp = $this->validIdentity;
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
