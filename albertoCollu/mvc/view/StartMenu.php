<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartMenu
 *
 * @author Alberto
 */
class StartMenu {

    private $numElement;
    private $element;

    function __construct() {
        $this->numElement = 0;
    }

    public function getNumElement() {
        return $this->numElement;
    }

    public function getElement() {
        return $this->element;
    }

    public function addElement($title, $href, $class) {
        if ($href) {
            $this->element[$this->numElement++] = "<li class=\"$class\"><a class=\"linkAdd\" style=\"text-decoration: none;\" href=\"$href\">$title</a></li>\n";
        } else {
            $this->element[$this->numElement++] = "<a>$title</a>\n";
        }
    }

    public function __toString() {
        $html = "<div class=\"linkSideBar\">\n";
        $html .= "<ul>";
        for ($i = 0; $i < $this->numElement; $i++) {
            $html .= $this->element[$i];
        }
        $html .= "</ul>";
        $html .= "</div>\n";
        return $html;
    }
}