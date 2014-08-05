<?php

require_once (__DIR__) . "/../model/User.php";
require_once (__DIR__) . "/../model/TecnoShop.php";

/**
 * Description of AccesManager
 * Gestisce gli accessi al sito web
 * @author Alberto
 */
class AccesManager {

    const
            ACCESS_FORBIDDEN = 0,
            ACCESS_GUEST = 1,
            ACCESS_BUYER = 2,
            ACCESS_SELLER = 4,
            ACCESS_ADMIN = 8,
            ACCESS_NOBUYER = 12,
            ACCESS_NOSELLER = 10,
            ACCESS_PUBLIC = 15;

    private $user;
    private $msgError;
    private static $accessLevel = AccesManager::ACCESS_GUEST;

    function __construct() {
        if (isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
        }
    }

    public function getUser() {
        return $this->user;
    }

    public function getMsgError() {
        return $this->msgError;
    }

    public function login($email, $password) {
        if (isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
        } else {
            $this->user = User::login($email, TecnoShop::sha1Password($password));
        }
        if ($this->user) {
            $_SESSION["user"] = $this->user;
        } else {
            $this->msgError = "Errore i dati inseriti sono incorretti!";
        }
    }

    public function logout() {
        $_SESSION = array();

        if (session_id() != "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 2592000, '/');
        }

        session_destroy();
        $this->user = NULL;
    }

}
