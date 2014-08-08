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
    // Di default il livello d'accesso è GUEST
    private static $accessLevel = AccesManager::ACCESS_GUEST;

    /*
     * In questo costruttore controlliamo se l'utente è presente in sessione. E' un controllo fatto
     * solamente a scopo precauzionale. Abbiamo introdotto un nuovo metodo: "updateAccessLevel(...);
     * Dall'invocazione di questo metodo si può dedurre che accetta come parametro un gruppo. Nel nostro
     * caso sarebbe il campo "identity" della tabella "usersTable".
     * 
     * STEP 1: implementiamo questo metodo
     */

    function __construct() {
        if (isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
            $this->updateAccessLevel($this->user->getIdentity());
        }
    }

    public static function getAccessLevel() {
        return self::$accessLevel;
    }

    public function getUser() {
        return $this->user;
    }

    /*
     * Molto semplicemente questo metodo a seconda dell'identità, passatagli come parametro
     * aggiorna o ripristina (a seconda di dove utilizzato) il livello d'accesso.
     * 
     * STEP 2: Vediamo dove viene richiamato (escluso il costruttore).
     *         Andiamo nel metodo "login".
     */

    private function updateAccessLevel($identity) {
        switch ($identity) {
            case "admin":
                AccesManager::$accessLevel = AccesManager::ACCESS_ADMIN;
                break;
            case "seller":
                AccesManager::$accessLevel = AccesManager::ACCESS_SELLER;
                break;
            case "buyer":
                AccesManager::$accessLevel = AccesManager::ACCESS_BUYER;
                break;
            default :
                AccesManager::$accessLevel = AccesManager::ACCESS_GUEST;
                break;
        }
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

            /*
             * Quando lo user entra in sessione, quindi dopo aver fatto il login, dobbiamo aggiornargli i permessi
             * in quanto per la nostra applicazione esso era visto come un utente GUEST, ma dopo aver compiuto il 
             * login dobbiamo capire chi è. SELLER ? ADMIN ? BUYER? La nostra applicazione deve sapere l'identità
             * dell'utente appena loggato.
             * 
             * STEP 3: Modifichiamo il metodo logout.
             */
            $this->updateAccessLevel($this->user->getIdentity());
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
        // Quando l'utente fa il logout il suo livello d'accesso deve essere ripristinato a guest.
        AccesManager::$accessLevel = AccesManager::ACCESS_GUEST;
    }

    /*
     * STEP 4:
     * Per completare l'implementazione dei permessi dovremmo implementare due metodi complementari tra loro.
     * Il primo di questi è "checkGroupAcess". Questo metodo non fa altro che effettuare l'and logico tra il 
     * livello d'accesso dell'utente appena entrato in sessione e il permesso che la pagina deve avere. 
     * Successivamente implementiamo il metodo "checkAccess" (che USEREMO NELLA INDEX.PHP) che ci servirà 
     * per stabilire quali elementi della sidebar l'utente appena loggato potrà visualizzare.
     * 
     * DOMANDA: Si ok ho capito tutto, ma la pagina come la protegiamo effettivamente ?
     * RISPOSTA: Non avere fretta, questo mistero sarà svelato nello STEP 6.
     */
    
    /*
     * Questo metodo effettua l'and logico tra il livello d'accesso dell'utente corrente e il livello d'accesso
     * della pagine che noi stessi abbiamo prestabilito.
     * 
     * ESEMPIO:
     * 
     * utente --> SELLER --> $accessLevel = ACCESS_SELLER quindi $accessLevel = 4;
     * 
     * Vogliamo visualizzare, per esempio, la pagina "Vendi Computer" accessibile solamente agli utenti "seller"
     * e agli utenti "admin", quindi di conseguenza questa pagine avrà come livello d'accesso ACCESS_NOBUYER,
     * quindi il livello d'accesso sarà = 12.
     * 
     * Effettuiamo l'and logico:
     * 
     * 4   --> 0100
     * 12  --> 1100
     * Ris --> 0100 
     * 
     * Come si può notare il valore di Ris è proprio 4, ovvero il valore della costante che identifica il permesso
     * dei "seller".
     *
     */
    public static function checkGroupAccess($accessLevel, $predeterminedAccessLevel) {
        return ($accessLevel & $predeterminedAccessLevel);
    }
    
    /*
     * Questo metodo come detto precedentemente, verrà utilizzato nella index come controllo per poter far
     * visualizzare all'utente corrente determinati elementi della sidebar. Quindi se l'utente è "seller" 
     * visualizzerà determinate cose, mentre se l'utente è "buyer" ne visualizzerà altre". Molto semplicemente
     * questo metodo invoca il metodo "checkGroupAcess" e restituisce il risultato dell'and logico (vedi spiegazione
     * su).
     * s
     */
    public static function checkAccess($predeterminedAccessLevel) {
        return AccesManager::checkGroupAccess(AccesManager::$accessLevel, $predeterminedAccessLevel);
    }

}
