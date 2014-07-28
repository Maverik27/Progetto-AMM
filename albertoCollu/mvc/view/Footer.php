<?php

/**
 * Description of Footer
 *
 * @author Banana Joe
 */
class Footer {
    
    function __construct() {
        
    }
    
    public function __toString() {
        $html ="<div class=\"footer\">";
        $html.="\tCopyright &copy; 2014 - Tecno Shop. Tutti i Diritti riservati. "
                . "Webdesign <a href=\"mailto:albe.collu@gmail.com\"> Alberto Collu</a>\n  ";
        $html.="</div>";
        return $html;        
    }

    
}
