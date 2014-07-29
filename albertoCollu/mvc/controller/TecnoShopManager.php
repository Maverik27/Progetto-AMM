<?php

require_once 'InputManager.php';

/**
 * Description of TecnoShopManager
 *
 * @author Banana Joe
 */
class TecnoShopManager {

//  private static $instance = NULL;
    private static $active = NULL;
    private $inputManager;

    function __construct() {
        TecnoShopManager::$active = FALSE;
        $this->inputManager = new InputManager();
        $this->manageInput();
//      TecnoShopManager::$instance = $this; 
    }

    public function setActive() {
        TecnoShopManager::$active = TRUE;
    }

    public function getInputManager() {
        return $this->inputManager;
    }

    public function manageInput() {
        $this->inputManager->addInputToArray("page", $_GET);
    }

}
