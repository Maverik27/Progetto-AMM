<?php

require_once 'ProductsMenu.php';
//require_once "mvc/controller/TecnoShopManager.php";

/**
 * Description of SidebarLeft
 *
 * @author Banana Joe
 */
class SidebarLeft {

    private $productsMenu;
    //private $user;

    function __construct() {
        //$this->user = TecnoShopManager::getInstance()->getAccessManager()->getUser();
        $this->productsMenu = new ProductsMenu();
    }

    public function __toString() {
        $html = "<div id=\"sidebar\">";
        $html .= "<div class=\"linkSideBar\">\n";
        $html .= "<ul>";
        $html .= "<li style=\"list-style-image: url(css/img/cerca.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=cerca\">Cerca nel Sito</a></li>";
        $html .= "<li style=\"list-style-image: url(css/img/chisiamo.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=chisiamo\">Chi siamo</a></li>";
        $html .= "<li style=\"list-style-image: url(css/img/registrati.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=registrati\">Registrati</a></li>";
        $html .= "</ul>";
        $html .= "</div>\n";
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->productsMenu;
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        //if ($this->user->getIdentity() == User::IDENTITY_BUYER) {
        $html .=$this->addBuyerFeaturesInSidebar();
        //}
        $html .= "<hr align=\"center\" size=\"1\" color=\"#17769C\">";
        $html .= $this->addSocialInSidebar();
        $html .= "</div>\n";
        return $html;
    }

    public function getProductsMenu() {
        return $this->productsMenu;
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

    public function addBuyerFeaturesInSidebar() {
        $html = "<div class=\"buyerFeatures\">\n";
        $html .= "<ul>";
        $html .= "<li style=\"list-style-image: url(css/img/edit.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=profile\">Modifica i tuoi dati</a></li>";
        $html .= "<li style=\"list-style-image: url(css/img/wallet.png);\"> <a style=\"text-decoration: none;\" href=\"index.php?page=ricarica\">Ricarica Credito</a></li>";
        $html .= "</ul>";
        $html .= "</div>\n";
        return $html;
    }

}
