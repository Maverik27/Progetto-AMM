<?php

require_once(__DIR__) . '/../model/Computer.php';

/**
 * Description of GuestManager
 *
 * @author Alberto
 */
class GuestManager {

    function __construct() {
        
    }

    public function getGuestView($type) {
        return Computer::getGuestView($type);
    }

}
