<?php

/**
 * Description of ProductsMenu
 *
 * @author Alberto
 */
class ProductsMenu {

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

    public function addElement($title, $href, $src) {
        if ($href && $src) {
            $this->element[$this->numElement++] = "<a style=\"text-decoration: none;\" href=\"$href\"><img src=\"$src\">$title</a>\n";
        } else {
            $this->element[$this->numElement++] = "<a>$title</a>\n";
        }
    }

    public function __toString() {
        $html = "<div class=\"imgSideBar\">\n";
        for ($i = 0; $i < $this->numElement; $i++) {
            $html .= $this->element[$i];
        }
        $html .= "</div>\n";
        return $html;
    }

}
