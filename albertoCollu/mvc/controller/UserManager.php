<?php

require_once (__DIR__) . "/../model/User.php";

/**
 * Description of UserManager
 *
 * @author Alberto
 */
class UserManager {
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


}
