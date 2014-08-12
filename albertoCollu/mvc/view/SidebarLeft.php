<?php

require_once 'ProductsMenu.php';
require_once 'AdditionalMenu.php';
require_once 'StartMenu.php';

/**
 * Description of SidebarLeft
 *
 * @author Banana Joe
 */
class SidebarLeft {

    private $productsMenu;
    private $additionalMenu;
    private $startMenu;

    function __construct() {
        $this->productsMenu = new ProductsMenu();
        $this->additionalMenu = new AdditionalMenu();
        $this->startMenu = new StartMenu();
    }

    public function __toString() {
        $html = "<div id=\"sidebar\">";
        $html .= $this->startMenu;
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->productsMenu;
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .=$this->additionalMenu;
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->addSocialInSidebar();
        $html .= "</div>\n";
        return $html;
    }

    public function getProductsMenu() {
        return $this->productsMenu;
    }

    public function getAdditionalMenu() {
        return $this->additionalMenu;
    }

    public function getStartMenu() {
        return $this->startMenu;
    }

    public function addSocialInSidebar() {
        $html = "<div class=\"linkSocial\">\n";
        $html .="<a style=\"text-decoration: none;\" href=\"index.php?page=welcome\"><img src=\"css/img/house.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://www.facebook.com/\"><img src=\"css/img/facebook.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://twitter.com/\"><img src=\"css/img/twitter.png\"> </a>";
        $html .="<a style=\"text-decoration: none;\" href=\"https://www.youtube.com/\"><img src=\"css/img/youtube.png\"> </a>";
        $html .= "</div>";
        return $html;
    }

}
