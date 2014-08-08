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

    private static $instance = NULL;
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
        TecnoShopManager::$instance = $this;
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
    
    /*
     * STEP 6:
     * 
     * Questo metodo è il vero e proprio metodo che progette le nostre pagine.
     * Prima di spiegarti il metodo voglio farti notare una particolarità. Se il controllo nell'if è
     * valido come puoi notare non viene "eseguita" nessuna istruzione. Inizialmente questo metodo è stato
     * pensato al contrario. Mi spiego meglio: il controllo nell'if dove essere negato e l'istruzione "die()" dove
     * trovari nel ramo if e non nel ramo else. Tuttavia per qualche arcano motivo non riusciavamo a farlo tornare
     * e allora l'abbiamo forzato, facendo in modo che se entrasse nell'if non facesse proprio niente. Sinceramente
     * non ti so dare una spiegazione del perché non tornasse.
     * Prova però ad astrarre un attimo l'implementazione del metodo. Il cuore di tutto sta proprio nell'istruzione
     * "die()". Infatti se per qualche motivo qualcuno riuscisse ad aver accesso ad una pagina che non gli compete,
     * la visualizzazione sarebbe subito bloccata dal "die()".
     * 
     * Il metodo in se non fa molto altro. L'unica particolarità è questa:
     * 
     * QUESTO METODO VA INVOCATO SU QUALSIASI PAGINA DELLA NOSTRA APPLICAZIONE PER FARE IN MODO CHE VENGA PROTETTA
     * CON UN DETERMINATO LIVELLO D'ACCESSO.
     * 
     * Quindi concludiamo con lo STEP 7 andando a invocare questo metodo in tutte le pagine della cartella "commons".
     */
    
    public static function protect($accessLevel) {
        if(TecnoShopManager::$active && AccesManager::checkAccess($accessLevel)) {
            
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

            default :
                break;
        }

        $this->inputManager->addInputToArray("page", $_GET);
    }

}
