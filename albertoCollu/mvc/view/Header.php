<?php

/**
 * Description of Header
 *
 * @author Alberto Collu
 */
class Header {

    public function __toString() {
        $html = "<div class=\"header\" href=\"index.php?page=welcome\">\n";         
        $html .= "<a style=\"text-decoration: none;\" href=\"index.php?page=welcome\"><img src=\"css/img/header.png\"></a>\n";
        $html .= "<a class=\"ts\" style=\"text-decoration: none;\" href=\"index.php?page=welcome\"><img src=\"css/img/tecnoshop.png\"></a>\n";
        $html .= "</div>";
        return $html;
    }

}