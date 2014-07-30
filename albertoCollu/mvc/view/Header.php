<?php

/**
 * Description of Header
 *
 * @author Banana Joe
 */
class Header {

    private $headerTitle;

    public function __construct() {
        $this->headerTitle = "<h1>TecnoShop</h1>";
    }

    public function __toString() {
        $html = "<div class=\"header\">\n";
        $html.= "<div class=\"title\">" . $this->headerTitle . "</div>";
        $html .= "</div>";
        return $html;
    }

}
