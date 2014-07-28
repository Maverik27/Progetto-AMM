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
        $html = "<div class=\"content\" >\n";
        return $html;
    }

    public function containerBottom() {
       $html = "</div>\n";
       return $html;
    }

}
