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
        $html .= "<ul>";
        $html .= "<li style=\"list-style-image: url(css/img/login.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=login\"> Log in </a></li>";
        $html .= "<li style=\"list-style-image: url(css/img/chisiamo.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=chisiamo\"> Chi siamo </a></li>";
        $html .= "<li style=\"list-style-image: url(css/img/contattaci.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=contattaci\"> Contattaci </a></li>";
        $html .= "</ul>";
        $html .= "</div>\n";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->addImgInSidebar();
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->addSocialInSidebar();
        $html .= "</div>\n";
        return $html;
    }

    public function addImgInSidebar() {
        $html = "<div class=\"imgSideBar\">\n";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=desktop\"><img src=\"css/img/Desktop.png\">Desktop</a>";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=portatili\"><img src=\"css/img/pcPortatili.png\">Portatili</a>";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=monitor\"><img src=\"css/img/Monitor.png\">Monitor</a>";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=accessori\"><img src=\"css/img/Accessori.png\">Accessori</a>";
        $html .= "</div>";
        return $html;
    }

    public function addSocialInSidebar() {
        $html = "<div class=\"linkSocial\">\n";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=welcome\"><img src=\"css/img/house.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://www.facebook.com/\"><img src=\"css/img/facebook.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://twitter.com/\"><img src=\"css/img/twitter.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://www.youtube.com/\"><img src=\"css/img/youtube.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"#\"><img src=\"css/img/like.png\"> </a>";
        $html .= "</div>";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        return $html;
    }

}
