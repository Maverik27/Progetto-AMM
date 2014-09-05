<?php

require_once "mvc/controller/TecnoShopManager.php";

/**
 * Description of Content
 *
 * @author Alberto Collu
 */
class Content {

    private $showLogin = TRUE;
    private $user;

    function __construct($login = TRUE) {
        $this->showLogin = ($login == TRUE);
        $this->user = TecnoShopManager::getInstance()->getAccessManager()->getUser();
    }

    public function contentTop() {
        $html = "<div id=\"content\" >\n";
        $html.= $this->bar();
        $html.= "<hr align=\"center\" size=\"1\" color=\"#17769C\">\n";
        $html.= "<div class=\"content\">";
        return $html;
    }

    public function contentBottom() {
        $html = "</div>\n</div>\n";
        return $html;
    }

    public function showLogin() {
        $html = "<p class=\"barText\">Effettua l'accesso per acquistare e vendere sul nostro sito!</p>";
        $html .= "<a style=\"text-decoration: none;\" href=\"index.php?page=login\"><img class=\"loginbutton\" src=\"css/img/login.png\"></a>";
        return $html;
    }

    public function showLogout() {
        $html = "<p class=\"barText\">Benvenuto <a href=\"index.php?page=profile\">" . $this->user->getName() . "!</a>";
        $html .= "<form action=\"index.php?\" method=\"post\">\n";
        $html .= "<input type=\"hidden\" name=\"action\" value=\"logout\"/>";
        $html .= "<button class=\"logoutbutton\" type=\"submit\">Logout</button>";
        $html .= "</form></p>";
        return $html;
    }

    public function setShowLogin($showLogin = TRUE) {
        $this->showLogin = ($showLogin == TRUE);
    }

    public function bar() {
        $html = "<div class=\"barra\">\n";
        if ($this->showLogin) {
            $html .= $this->showLogin();
        } else {
            $html .= $this->showLogout();
        }
        $html.="</div>\n";
        return $html;
    }

}
