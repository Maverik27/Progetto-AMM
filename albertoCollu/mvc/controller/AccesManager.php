<?php

require_once (__DIR__) . "/../model/User.php";
require_once (__DIR__) . "/../model/TecnoShop.php";

/**
 * Description of AccesManager
 * Gestisce gli accessi al sito web
 * @author Alberto
 */
class AccesManager {

    private $user;
    private $msgError;

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
