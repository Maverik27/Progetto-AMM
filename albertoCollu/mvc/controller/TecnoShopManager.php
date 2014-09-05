<?php

require_once 'InputManager.php';
require_once (__DIR__) . "/../model/TecnoShop.php";
require_once 'AccesManager.php';
require_once 'UserManager.php';
require_once 'DepotManager.php';
require_once 'GuestManager.php';

/**
 * Description of TecnoShopManager
 * Controller Supremo
 * @author Alberto Collu
 */
class TecnoShopManager {

    private static $instance = NULL;
    private static $active = NULL;
    private $inputManager;
    private $tecnoShop;
    private $accessManager;
    private $userManager;
    private $depotManager;
    private $guestManager;

    public function __construct() {
        TecnoShopManager::$instance = $this;
        TecnoShopManager::$active = FALSE;
        session_start();

        $this->tecnoShop = new TecnoShop();
        $this->inputManager = new InputManager();
        $this->accessManager = new AccesManager();
        $this->userManager = new UserManager($this->accessManager->getUser());
        $this->depotManager = new DepotManager($this->accessManager->getUser());
        $this->guestManager = new GuestManager();
        $this->manageInput();
    }

    public static function getInstance() {
        return self::$instance;
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

    public function getDepotManager() {
        return $this->depotManager;
    }

    public function getGuestManager() {
        return $this->guestManager;
    }

    public static function protect($accessLevel) {
        if (TecnoShopManager::$active && AccesManager::checkAccess($accessLevel)) {
            
        } else {
            die();
        }
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
            case "register":
                $this->inputManager->addInputToArray("email", $_POST);
                $this->inputManager->addInputToArray("password", $_POST);
                $this->inputManager->addInputToArray("repeatPassword", $_POST);
                $this->inputManager->addInputToArray("name", $_POST);
                $this->inputManager->addInputToArray("surname", $_POST);
                $this->inputManager->addInputToArray("identity", $_POST);
                $this->inputManager->addInputToArray("address", $_POST);
                if ($this->inputManager->getInput("password") == $this->inputManager->getInput("repeatPassword")) {
                    $this->accessManager->register(
                            $this->inputManager->getInput("email"), $this->inputManager->getInput("password"), $this->inputManager->getInput("name"), $this->inputManager->getInput("surname"), $this->inputManager->getInput("identity"), $this->inputManager->getInput("address")
                    );
                }
                break;
            case "changeData":
                $this->inputManager->addInputToArray("email", $_POST);
                $this->inputManager->addInputToArray("name", $_POST);
                $this->inputManager->addInputToArray("surname", $_POST);
                $this->inputManager->addInputToArray("address", $_POST);
                $userTemp = new User();
                $userTemp->setEmail($this->inputManager->getInput("email"));
                $userTemp->setName($this->inputManager->getInput("name"));
                $userTemp->setSurname($this->inputManager->getInput("surname"));
                $userTemp->setAddress($this->inputManager->getInput("address"));
                //con questo aggiorno il DB ma non i campi dell'utente del sito in sessione
                $this->userManager->changeProfile($userTemp);
                //da qui aggiorno snche i campi dell'utente del sito con le modifiche
                $this->accessManager->getUser()->setEmail($userTemp->getEmail());
                $this->accessManager->getUser()->setName($userTemp->getName());
                $this->accessManager->getUser()->setSurname($userTemp->getSurname());
                $this->accessManager->getUser()->setAddress($userTemp->getAddress());
                break;
            case "addCredit":
                $this->inputManager->addInputToArray("credit", $_POST);
                $creditUpdated = $this->accessManager->getUser()->getCredit() + $this->inputManager->getInput("credit");
                if ($this->userManager->realUpdateCredit($creditUpdated)) {
                    $this->accessManager->getUser()->setCredit($creditUpdated);
                }
                break;
            case "addNew":
                $this->inputManager->addInputToArray("type", $_POST);
                $this->inputManager->addInputToArray("brand", $_POST);
                $this->inputManager->addInputToArray("model", $_POST);
                $this->inputManager->addInputToArray("inces", $_POST);
                $this->inputManager->addInputToArray("os", $_POST);
                $this->inputManager->addInputToArray("cpu", $_POST);
                $this->inputManager->addInputToArray("ram", $_POST);
                $this->inputManager->addInputToArray("storage", $_POST);
                $this->inputManager->addInputToArray("gpu", $_POST);
                $this->inputManager->addInputToArray("nitems", $_POST);
                $this->inputManager->addInputToArray("price", $_POST);
                $this->inputManager->addInputToArray("description", $_POST);
                
                $computer = new Computer();
                $computer->setType($this->inputManager->getInput("type"));
                $computer->setBrand($this->inputManager->getInput("brand"));
                $computer->setModel($this->inputManager->getInput("model"));
                $computer->setInces($this->inputManager->getInput("inces"));
                $computer->setOs($this->inputManager->getInput("os"));
                $computer->setCpu($this->inputManager->getInput("cpu"));
                $computer->setRam($this->inputManager->getInput("ram"));
                $computer->setStorage($this->inputManager->getInput("storage"));
                $computer->setGpu($this->inputManager->getInput("gpu"));
                $computer->setDescription($this->inputManager->getInput("description"));
                
                if (AccesManager::checkAccess(AccesManager::ACCESS_NOBUYER)) {
                    $computer->setId($this->depotManager->addComputer($computer));
                    if ($computer->getId() > 0) {
                        $depot = new Depot();
                        $depot->setSeller(new User());
                        $depot->getSeller()->setId($this->accessManager->getUser()->getId());
                        $depot->setComputer($computer->getId());
                        $depot->setNItems($this->inputManager->getInput("nitems"));
                        $depot->setPrice($this->inputManager->getInput("price"));
                        $this->depotManager->confirmToSell($depot);
                    }
                }
                break;
            default :
                break;
        }

        $this->inputManager->addInputToArray("page", $_GET);
    }

}
