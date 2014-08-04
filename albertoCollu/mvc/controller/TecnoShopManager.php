<?php

require_once 'InputManager.php';
require_once (__DIR__) . "/../model/TecnoShop.php";
require_once 'AccesManager.php';
require_once 'UserManager.php';

/**
 * Description of TecnoShopManager
 * Controller Supremo
 * @author Banana Joe
 */
class TecnoShopManager {

//  private static $instance = NULL;
    private static $active = NULL;
    private $inputManager;
    private $tecnoShop;
    private $accessManager;
    private $userManager;

    public function __construct() {
        TecnoShopManager::$active = FALSE;
        $this->tecnoShop = new TecnoShop();
        $this->inputManager = new InputManager();
        $this->accessManager = new AccesManager();
        $this->userManager = new UserManager($this->accessManager->getUser());
        session_start();
        $this->manageInput();
//      TecnoShopManager::$instance = $this; 
    }

    public function setActive() {
        TecnoShopManager::$active = TRUE;
    }

    public function getInputManager() {
        return $this->inputManager;
    }

    public function getTecnoShop() {
        return $this->tecnoShop;
    }

    public function getAccessManager() {
        return $this->accessManager;
    }

    public function getUserManager() {
        return $this->userManager;
    }

    public function manageInput() {
        $this->inputManager->addInputToArray("action", $_REQUEST);

        switch ($this->inputManager->getInput("action")) {

            case "login":
                $this->inputManager->addInputToArray("email", $_POST);
                $this->inputManager->addInputToArray("password", $_POST);
                $this->accessManager->login($this->inputManager->getInput("email"), $this->inputManager->getInput("password"));
                $this->userManager->setUser($this->accessManager->getUser());
                break;

            case "logout":
                $this->accessManager->logout();
                break;

            default :
                break;
        }

        $this->inputManager->addInputToArray("page", $_GET);
    }

}
