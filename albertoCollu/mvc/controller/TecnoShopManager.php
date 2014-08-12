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
        TecnoShopManager::$instance = $this;
        TecnoShopManager::$active = FALSE;
        session_start();

        $this->tecnoShop = new TecnoShop();
        $this->inputManager = new InputManager();
        $this->accessManager = new AccesManager();
        $this->userManager = new UserManager($this->accessManager->getUser());
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
                            $this->inputManager->getInput("email"), 
                            $this->inputManager->getInput("password"), 
                            $this->inputManager->getInput("name"), 
                            $this->inputManager->getInput("surname"), 
                            $this->inputManager->getInput("identity"), 
                            $this->inputManager->getInput("address")
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
                if($this->userManager->realUpdateCredit($creditUpdated)){
                    $this->accessManager->getUser()->setCredit($creditUpdated);
                }
                break;
            default :
                break;
        }

        $this->inputManager->addInputToArray("page", $_GET);
    }

}
