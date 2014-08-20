<?php

require_once (__DIR__) . "/../model/User.php";
require_once (__DIR__) . "/../model/Computer.php";

/**
 * Description of DepotManager
 *
 * @author Alberto
 */
class DepotManager {

    private $user = NULL;

    public function __construct($user = NULL) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function addComputer($computer) {
        if (AccesManager::checkAccess(AccesManager::ACCESS_NOBUYER)) {
            return Computer::addComputer($computer);
        }
    }

    public function confirmToSell($depot) {
        if (AccesManager::checkAccess(AccesManager::ACCESS_NOBUYER)) {
            return Depot::confirmToSell($depot);
        }
    }

}
