<?php

/**
 * Description of Header
 *
 * @author Alberto Collu
 */
class Header {

    public function __toString() {
        $html = "<div class=\"header\">\n";
        $html .= "<img src=\"css/img/tecnoshop.png\">\n";
        $html .= "</div>";
        return $html;
    }

}
