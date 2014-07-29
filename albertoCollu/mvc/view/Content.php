<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Content
 *
 * @author Banana Joe
 */
class Content {
    
    function __construct() {
        
    }
        
    public function contentTop() {
        $html = "<div id=\"content\" >\n";
        $html.= $this->searchBar();
        $html.= "<hr align=\"center\" size=\"1\" color=\"#17769C\">\n";
        $html.= "<div class=\"content\">";
        return $html;
    }

    public function contentBottom() {
       $html = "</div>\n</div>\n";
       return $html;
    }

    public function searchBar(){
        $html ="<div class=\"barra\">\n";
        $html.="<form id=\"BarraRicerca\">\n";
        $html.="<input type=\"text\" placeholder=\"Cerca nel Sito\">\n";
        $html.="<button type=\"submit\">Cerca</button>\n";
        $html.="</form>\n";
        $html.="</div>\n";
        return $html;
    }
}
