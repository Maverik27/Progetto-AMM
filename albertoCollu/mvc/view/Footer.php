<?php

/**
 * Description of Footer
 *
 * @author Banana Joe
 */
class Footer {

    private $info;

    function __construct() {
        $this->info = "<p>\tCopyright &copy; 2014 - Tecno Shop. Tutti i Diritti riservati. "
                . "Webdesign <a href=\"mailto:albe.collu@gmail.com\"> Alberto Collu</a></p>\n";
    }

    public function __toString() {

        $html = "<div id=\"footer\">";
        $html.= "<div class=\"barF\"> <img src=\"css/img/barF.png\"/></div>\n";
        $html .= $this->info;
        $html.="</div>";
        return $html;
    }

}
