<?php

/**
 * Description of SidebarLeft
 *
 * @author Banana Joe
 */
class SidebarLeft {

    function __construct() {
        
    }

    public function __toString() {
        $html = "<div id=\"sidebar\">";
        $html .= "<div class=\"linkSideBar\">\n";
        $html .= "<a style=\"text-decoration:none;\" href=\"index.php?page=chisiamo\"><img src=\"css/img/chisiamo.png\" width=\"45\" height=\"20\"></a>";
        $html .= "<a style=\"text-decoration:none;\" href=\"index.php?page=contattaci\"><img src=\"css/img/contattaci.png\" width=\"45\" height=\"20\"></a>";
        $html .= "<a style=\"text-decoration:none;\" href=\"index.php?page=login\"><img src=\"css/img/login.png\" width=\"45\" height=\"20\"></a>";
        $html .= "</div>\n";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->addDivInSidebar();
        $html .= "</div>\n";
        return $html;
    }

    public function addDivInSidebar() {
        $html = "<div class=\"imgSideBar\">\n";
        $html .= "<a style=\"text-decoration:none;\" href=\"#\"><img src=\"css/img/pcPortatili.png\" width=\"80\" height=\"65\"/> Pc e Tablet </a>\n ";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= "<br/>";
        $html .= "<a style=\"text-decoration:none;\" href=\"#\"><img src=\"css/img/Desktop.png\" width=\"80\" height=\"60\"/> Pc Desktop </a>\n ";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= "<br/>";
        $html .= "<a style=\"text-decoration:none;\" href=\"#\"><img src=\"css/img/Monitor.png\" width=\"80\" height=\"55\"/> Monitor </a>\n ";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= "<br/>";
        $html .= "<a style=\"text-decoration:none;\" href=\"#\"><img src=\"css/img/Accessori.png\" width=\"60\" height=\"60\"/> Acessori </a>\n ";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= "</div>";
        return $html;
    }

}
