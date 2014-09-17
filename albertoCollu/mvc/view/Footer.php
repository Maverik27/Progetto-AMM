<?php

/**
 * Description of Footer
 *
 * @author Alberto Collu
 */
class Footer {

    private $info;

    function __construct() {
        $this->info = "<div class=\"info\"><p>\tCopyright &copy; 2014 - TecnoShop. Tutti i Diritti riservati. "
                . "Webdesign <a href=\"mailto:albe.collu@gmail.com\"> Alberto Collu</a></p></div>\n";
    }

    public function __toString() {

        $html = "<div id=\"footer\">";
        $html.= $this->info;
        $html.="</div>";
        return $html;
    }

}
