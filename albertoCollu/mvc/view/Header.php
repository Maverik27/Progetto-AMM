<?php

/**
 * Description of Header
 *
 * @author Banana Joe
 */
class Header {

    public function __toString() {
        $html = "<div class=\"header\">\n";
        $html .= "<img src=\"css/img/tecnoshop.png\">\n";
        $html .= "</div>";
        return $html;
    }

}
